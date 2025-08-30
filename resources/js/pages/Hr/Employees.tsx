import App from '@/layouts/AppLayout'
import { EmployeeListProps } from '@/types/hr';
import { useCallback, useState } from 'react';
import { router } from '@inertiajs/react'
import MultiSelect from '@/components/ui/MultiSelect';
import { getArrayParam, getStringParam } from '@/lib/utils';


const Employees = ({ employees, departments, categories, countries, sponsorships, genders, status, qualifications }: EmployeeListProps) => {

    const [formData, setFormData] = useState({
        gender: getArrayParam('gender'),
        status: getArrayParam('status'),
        departments: getArrayParam('departments'),
        categories: getArrayParam('categories'),
        countries: getArrayParam('countries'),
        sponsorships: getArrayParam('sponsorships'),
        qualifications: getArrayParam('qualifications'),
        from: getStringParam('from') ?? null,
        to: getStringParam('from') ?? null,
    });

    const handleGenderChange = useCallback(
        (gender: string[]) => setFormData((prev) => ({ ...prev, gender })),
        []
    );

    const handleStatusChange = useCallback(
        (status: string[]) => setFormData((prev) => ({ ...prev, status })),
        []
    );

    const handleDepartmentsChange = useCallback(
        (departments: string[]) => setFormData((prev) => ({ ...prev, departments })),
        []
    );

    const handleCategoriesChange = useCallback(
        (categories: string[]) => setFormData((prev) => ({ ...prev, categories })),
        []
    );

    const handleQualificationsChange = useCallback(
        (qualifications: string[]) => setFormData((prev) => ({ ...prev, qualifications })),
        []
    );

    const handleCountriesChange = useCallback(
        (countries: string[]) => setFormData((prev) => ({ ...prev, countries })),
        []
    );

    const handleSponsorshipsChange = useCallback(
        (sponsorships: string[]) => setFormData((prev) => ({ ...prev, sponsorships })),
        []
    );

    const submit = (e: React.FormEvent<HTMLFormElement>) => {
        e.preventDefault();
        const cleanFormData = Object.fromEntries(
            Object.entries(formData).filter(([, v]) => v !== null && v !== "")
        );
        router.visit(route('hr.employees'), {
            method: 'get',
            data: cleanFormData,
            preserveState: true,
            preserveScroll: true
        });
    }
    return (
        <App>
            <section>
                <form onSubmit={submit} method="post" className=''>

                    <div className='flex gap-10'>
                        <div>
                            <div>
                                <h3 className='font-bold'>From</h3>
                                <input type="date" name='from' value={formData.from} onChange={(e) => setFormData((prev) => ({ ...prev, from: e.target.value }))} />
                            </div>
                            <div>
                                <h3 className='font-bold'>To</h3>
                                <input type="date" name='to' value={formData.to} onChange={(e) => setFormData((prev) => ({ ...prev, to: e.target.value }))} />
                            </div>
                        </div>

                        <div>
                            <h3 className='font-bold'>Status</h3>
                            <MultiSelect
                                items={status.data}
                                name='status'
                                selected={formData.status}
                                onChange={handleStatusChange}
                            />
                        </div>

                        <div>
                            <h3 className='font-bold'>Gender</h3>
                            <MultiSelect
                                items={genders.data}
                                name="gender"
                                selected={formData.gender}
                                onChange={handleGenderChange}
                            />
                        </div>

                        <div>
                            <h3 className='font-bold'>Departments</h3>
                            <MultiSelect
                                items={departments.data}
                                name='departments'
                                selected={formData.departments}
                                onChange={handleDepartmentsChange}
                            />
                        </div>

                        <div>
                            <h3 className='font-bold'>Categories</h3>
                            <MultiSelect
                                items={categories.data}
                                selected={formData.categories}
                                name='categories'
                                onChange={handleCategoriesChange}
                            />
                        </div>

                        <div>
                            <h3 className='font-bold'>Nationality</h3>
                            <MultiSelect
                                items={countries.data}
                                selected={formData.countries}
                                name='countries'
                                onChange={handleCountriesChange}
                            />
                        </div>

                        <div>
                            <h3 className='font-bold'>Qualifications</h3>
                            <MultiSelect
                                items={qualifications.data}
                                selected={formData.qualifications}
                                name='qualifications'
                                onChange={handleQualificationsChange}
                            />
                        </div>

                        <div>
                            <h3 className='font-bold'>Sponsorship</h3>
                            <MultiSelect
                                items={sponsorships.data}
                                selected={formData.sponsorships}
                                name='sponsorships'
                                onChange={handleSponsorshipsChange}
                            />
                        </div>
                    </div>
                    <button type="submit">submit</button>
                </form>
                {employees.data.map((employee) => (
                    <div key={employee.id} className='p-4 flex gap-3'>
                        <span>{employee.empid}</span>
                        <span>{employee.id}</span>
                        <span>{employee.name_en}</span>
                        <span>{employee.gender.name}</span>
                        <span className={`badge ${employee.is_active ? "badge-success" : "badge-danger"}`}>{employee.is_active ? "active" : "not active"}</span>
                    </div>
                ))}
            </section>
        </App>
    );
}

export default Employees

