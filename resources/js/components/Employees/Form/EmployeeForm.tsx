import { useForm } from '@inertiajs/react';
import { store } from '@/routes/hr/employees';
import EmployeeBasicInformation from './BasicInformation';
import ContactInformation from './ContactInformation';
import FormActions from './FormActions';
import NameFields from './NameFields';
import PersonalInformation from './PersonalInformation';
import Photo from './Photo';

export default function EmployeeForm() {
    const { data, setData, post, errors, processing } = useForm({
        employee_code: '',
        first_name_ar: '',
        middle_name_ar: '',
        third_name_ar: '',
        last_name_ar: '',
        first_name_en: '',
        middle_name_en: '',
        third_name_en: '',
        last_name_en: '',
        gender_id: '',
        category_id: '',
        department_id: '',
        nationality_id: '',
        place_of_birth: '',
        religion_id: '',
        marital_status_id: '',
        special_needs_id: '',
        email: '',
        phone: '',
        home_telephone_number: '',
        home_country_identity: '',
        blood_type: '',
        joining_date: '',
        date_of_birth: '',
        image: null,
    });

    const submit = (e: React.FormEvent) => {
        e.preventDefault();
        post(store.url());
    };

    return (
        <form onSubmit={submit} className="mx-auto max-w-7xl space-y-6">
            <EmployeeBasicInformation
                values={{
                    employee_code: data.employee_code,
                    department_id: data.department_id,
                    category_id: data.category_id,
                    joining_date: data.joining_date,
                }}
                setData={setData}
                errors={{
                    employee_code: errors.employee_code,
                    department_id: errors.department_id,
                    category_id: errors.category_id,
                    joining_date: errors.joining_date,
                }}
            />

            <NameFields
                title="Arabic Name"
                description="Enter the employee's official Arabic name."
                dir="rtl"
                fieldPrefix="ar"
                values={{
                    first_name: data.first_name_ar,
                    middle_name: data.middle_name_ar,
                    third_name: data.third_name_ar,
                    last_name: data.last_name_ar,
                }}
                errors={{
                    first_name: errors.first_name_ar,
                    middle_name: errors.middle_name_ar,
                    third_name: errors.third_name_ar,
                    last_name: errors.last_name_ar,
                }}
                setData={setData}
            />
            <NameFields
                title="English Name"
                description="Enter the employee's official English name."
                dir="ltr"
                fieldPrefix="en"
                values={{
                    first_name: data.first_name_en,
                    middle_name: data.middle_name_en,
                    third_name: data.third_name_en,
                    last_name: data.last_name_en,
                }}
                errors={{
                    first_name: errors.first_name_en,
                    middle_name: errors.middle_name_en,
                    third_name: errors.third_name_en,
                    last_name: errors.last_name_en,
                }}
                setData={setData}
            />

            <PersonalInformation
                values={{
                    gender_id: data.gender_id,
                    date_of_birth: data.date_of_birth,
                    nationality_id: data.nationality_id,
                    place_of_birth: data.place_of_birth,
                    religion_id: data.religion_id,
                    marital_status_id: data.marital_status_id,
                    special_needs_id: data.special_needs_id,
                }}
                errors={{
                    gender_id: errors.gender_id,
                    date_of_birth: errors.date_of_birth,
                    nationality_id: errors.nationality_id,
                    place_of_birth: errors.place_of_birth,
                    religion_id: errors.religion_id,
                    marital_status_id: errors.marital_status_id,
                    special_needs_id: errors.special_needs_id,
                }}
                setData={setData}
            />

            <ContactInformation
                values={{
                    email: data.email,
                    phone: data.phone,
                    blood_type: data.blood_type,
                    home_telephone_number: data.home_telephone_number,
                    home_country_identity: data.home_country_identity,
                }}
                errors={{
                    email: errors.email,
                    phone: errors.phone,
                    blood_type: errors.blood_type,
                    home_telephone_number: errors.home_telephone_number,
                    home_country_identity: errors.home_country_identity,
                }}
                setData={setData}
            />

            <Photo
                values={{
                    image: data.image,
                }}
                errors={{
                    image: errors.image,
                }}
                setData={setData}
            />

            <FormActions processing={processing} />
        </form>
    );
}
