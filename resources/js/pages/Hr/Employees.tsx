import App from '@/layouts/AppLayout'
import { EmployeeListProps } from '@/types/hr';
import { useCallback, useRef, useState } from 'react';
import { router } from '@inertiajs/react'
import MultiSelect from '@/components/ui/MultiSelect';
import { getArrayParam, getStringParam } from '@/lib/utils';
import Calendar from '@/components/ui/Calendar';
import { t } from 'i18next';
import { useLanguage } from '@/hooks/useLanguage';
import image from '@/assets/images/logo.png'

import { SlUser } from "react-icons/sl";
import { SlUserFemale } from "react-icons/sl";


const Employees = ({
    employees,
    departments,
    categories,
    countries,
    sponsorships,
    genders,
    status,
    qualifications }: EmployeeListProps) => {

    const formRef = useRef<HTMLFormElement>(null);

    const [formData, setFormData] = useState({
        page: getArrayParam('page') ?? 1,
        gender: getArrayParam('gender'),
        status: getArrayParam('status'),
        departments: getArrayParam('departments'),
        categories: getArrayParam('categories'),
        countries: getArrayParam('countries'),
        sponsorships: getArrayParam('sponsorships'),
        qualifications: getArrayParam('qualifications'),
        active_from: getStringParam('active_from') ?? null,
        active_to: getStringParam('active_to') ?? null,
        joining_date_from: getStringParam('joining_date_from') ?? null,
        joining_date_to: getStringParam('joining_date_to') ?? null,
        resignation_date_from: getStringParam('resignation_date_from') ?? null,
        resignation_date_to: getStringParam('resignation_date_to') ?? null,
    });
    const { language } = useLanguage();

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

    const handleFilter = (e: React.FormEvent<HTMLFormElement>) => {
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
    const handleExport = (e: React.FormEvent) => {
        e.preventDefault();

        const exportForm = document.createElement('form');
        exportForm.method = 'POST';
        exportForm.action = route('hr.employees.export');
        exportForm.style.display = 'none';

        // Add formData as hidden inputs
        Object.entries(formData).forEach(([key, value]) => {
            if (value !== null && value !== "" && value !== undefined) {
                if (Array.isArray(value) && value.length > 0) {
                    // Send arrays with proper Laravel array notation
                    value.forEach((item, index) => {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = `${key}[${index}]`; // This creates gender[0], gender[1], etc.
                        input.value = String(item);
                        exportForm.appendChild(input);
                    });
                } else if (!Array.isArray(value)) {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = key;
                    input.value = String(value);
                    exportForm.appendChild(input);
                }
            }
        });

        // Add CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        if (csrfToken) {
            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = csrfToken;
            exportForm.appendChild(csrfInput);
        }

        document.body.appendChild(exportForm);
        exportForm.submit();
        document.body.removeChild(exportForm);
    };
    return (
        <App>
            <section>
                <form ref={formRef} onSubmit={handleFilter}>
                    <div className='flex gap-10 flex-wrap'>
                        <div>
                            <h4>{t('Active Employees')}</h4>
                            <div>
                                <h3 className='font-bold'>{t('From')}</h3>
                                <Calendar
                                    selectedDate={formData.active_from ? new Date(formData.active_from) : null}
                                    onDateSelect={(date) => setFormData((prev) => ({
                                        ...prev,
                                        active_from: date ? date.toISOString().slice(0, 10) : ""
                                    }))}
                                    placeholder={t('From')}
                                />
                            </div>
                            <div>
                                <h3 className='font-bold'>{t('To')}</h3>
                                <Calendar
                                    selectedDate={formData.active_to ? new Date(formData.active_to) : null}
                                    onDateSelect={(date) => setFormData((prev) => ({
                                        ...prev,
                                        active_to: date ? date.toISOString().slice(0, 10) : ""
                                    }))}
                                    placeholder={t('To')}
                                />
                            </div>
                        </div>
                        <div>
                            <h4>{t('Joinin Date')}</h4>
                            <div>
                                <h3 className='font-bold'>{t('From')}</h3>
                                <Calendar
                                    selectedDate={formData.joining_date_from ? new Date(formData.joining_date_from) : null}
                                    onDateSelect={(date) => setFormData((prev) => ({
                                        ...prev,
                                        joining_date_from: date ? date.toISOString().slice(0, 10) : ""
                                    }))}
                                    placeholder={t('From')}
                                />
                            </div>
                            <div>
                                <h3 className='font-bold'>{t('To')}</h3>
                                <Calendar
                                    selectedDate={formData.joining_date_to ? new Date(formData.joining_date_to) : null}
                                    onDateSelect={(date) => setFormData((prev) => ({
                                        ...prev,
                                        joining_date_to: date ? date.toISOString().slice(0, 10) : ""
                                    }))}
                                    placeholder={t('To')}
                                />
                            </div>
                        </div>
                        <div>
                            <h4>{t('Resingation Date')}</h4>
                            <div>
                                <h3 className='font-bold'>{t('From')}</h3>
                                <Calendar
                                    selectedDate={formData.resignation_date_from ? new Date(formData.resignation_date_from) : null}
                                    onDateSelect={(date) => setFormData((prev) => ({
                                        ...prev,
                                        resignation_date_from: date ? date.toISOString().slice(0, 10) : ""
                                    }))}
                                    placeholder={t('From')}
                                />
                            </div>
                            <div>
                                <h3 className='font-bold'>{t('To')}</h3>
                                <Calendar
                                    selectedDate={formData.resignation_date_to ? new Date(formData.resignation_date_to) : null}
                                    onDateSelect={(date) => setFormData((prev) => ({
                                        ...prev,
                                        resignation_date_to: date ? date.toISOString().slice(0, 10) : ""
                                    }))}
                                    placeholder={t('To')}
                                />
                            </div>
                        </div>

                        <div>
                            <h3 className='font-bold'>{t('Job Status')}</h3>
                            <MultiSelect
                                items={status.data}
                                name='status'
                                selected={formData.status}
                                onChange={handleStatusChange}
                            />
                        </div>

                        <div>
                            <h3 className='font-bold'>{t('Gender')}</h3>
                            <MultiSelect
                                items={genders.data}
                                name="gender"
                                selected={formData.gender}
                                onChange={handleGenderChange}
                            />
                        </div>

                        <div>
                            <h3 className='font-bold'>{t('Department')}</h3>
                            <MultiSelect
                                items={departments.data}
                                name='departments'
                                selected={formData.departments}
                                onChange={handleDepartmentsChange}
                            />
                        </div>

                        <div>
                            <h3 className='font-bold'>{t('Category')}</h3>
                            <MultiSelect
                                items={categories.data}
                                selected={formData.categories}
                                name='categories'
                                onChange={handleCategoriesChange}
                            />
                        </div>

                        <div>
                            <h3 className='font-bold'>{t('Nationality')}</h3>
                            <MultiSelect
                                items={countries.data}
                                selected={formData.countries}
                                name='countries'
                                onChange={handleCountriesChange}
                            />
                        </div>

                        <div>
                            <h3 className='font-bold'>{t('Qualification')}</h3>
                            <MultiSelect
                                items={qualifications.data}
                                selected={formData.qualifications}
                                name='qualifications'
                                onChange={handleQualificationsChange}
                            />
                        </div>

                        <div>
                            <h3 className='font-bold'>{t('Sponsorship')}</h3>
                            <MultiSelect
                                items={sponsorships.data}
                                selected={formData.sponsorships}
                                name='sponsorships'
                                onChange={handleSponsorshipsChange}
                            />
                        </div>
                    </div>
                    <button type="submit" >submit</button>
                    <button type="button" onClick={handleExport}>export</button>
                </form>
                <div className='w-full overflow-x-auto border-collapse whitespace-nowrap'>
                    <table className='p-2 min-w-full'>
                        <thead>
                            <tr className='border-2 border-border bg-surface'>
                                <th className='border-2 border-border'>ID</th>
                                <th className='border-2 border-border'>Empid</th>
                                <th className='border-2 border-border'>Name</th>
                                <th className='border-2 border-border'>National ID</th>
                                <th className='border-2 border-border'>Passport</th>
                                <th className='border-2 border-border'>Gender</th>
                                <th className='border-2 border-border'>Nationality</th>
                                <th className='border-2 border-border'>Date of Birth</th>
                                <th className='border-2 border-border'>Joining Date</th>
                                <th className='border-2 border-border'>Resignation Date</th>
                                <th className='border-2 border-border'>Department</th>
                                <th className='border-2 border-border'>Sponsorship</th>
                                <th className='border-2 border-border'>Sponsorship</th>
                                <th className='border-2 border-border'>Sponsorship</th>
                                <th className='border-2 border-border'>Sponsorship</th>
                            </tr>
                        </thead>
                        <tbody>
                            {employees.data.map((employee) => (
                                (<tr key={employee.id} className={`border-2 border-border ${!employee.is_active ? "text-danger" : "text-text"}`}>
                                    <td className='border-2 border-border'>{employee.empid}</td>
                                    <td className='border-2 border-border'>
                                        <img
                                            src={employee.image === null ? image : employee.image}
                                            alt={employee.name_en}
                                            className='size-15 p-2 rounded-3xl'
                                        />
                                    </td>
                                    <td className='flex flex-col justify-center'>
                                        <p className='flex justify-between'>
                                            <span>{language === 'en' ? employee.name_en : employee.name_ar}</span>
                                            <span className='text-xl text-accent p-2'>{employee.gender.id === '1' ? <SlUser /> : <SlUserFemale />}</span>
                                        </p>
                                        <span className='text-xs text-muted'>{employee.email}</span>
                                    </td>
                                    <td className='border-2 border-border'>{employee.identification}</td>
                                    <td className='border-2 border-border'>{employee.identification}</td>
                                    <td className='border-2 border-border '>{employee.gender.name}</td>
                                    <td className='border-2 border-border'>{employee.nationality}</td>
                                    <td className='border-2 border-border'>{new Date(employee.date_of_birth).toLocaleDateString(language, { year: 'numeric', month: 'short', day: '2-digit' })}</td>
                                    <td className='border-2 border-border'>{new Date(employee.joining_date).toLocaleDateString(language, { year: 'numeric', month: 'short', day: '2-digit' })}</td>
                                    <td className='border-2 border-border'>{employee.resignation_date ? (new Date(employee.resignation_date)).toLocaleDateString(language, { year: 'numeric', month: 'short', day: '2-digit' }) : ''}</td>
                                    <td className='border-2 border-border'>
                                        {Array.isArray(employee.departments)
                                            ? employee.departments.map((department: { id: number, name: string }) => department.name).join(', ')
                                            : ''}
                                    </td>
                                    <td className='border-2 border-border'>{employee.sponsorship}</td>
                                    <td className='border-2 border-border'>{employee.sponsorship}</td>
                                    <td className='border-2 border-border'>{employee.sponsorship}</td>
                                    <td className='border-2 border-border'>{employee.sponsorship}</td>
                                </tr>)
                            ))}
                        </tbody>
                    </table>
                </div>
            </section>
        </App>
    );
}

export default Employees

