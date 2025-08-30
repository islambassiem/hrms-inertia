// import { PageProps } from "@inertiajs/core";
// export interface EmployeesData extends PageProps {
//   data: Employee;
// }

interface Employee {
    'id': number,
    'empid': number,
    'gender': Resource,
    'name_ar': string,
    'name_en': string,
    'date_of_birth': Date,
    'is_active': boolean,
    'has_salary': boolean,
    'has_biometric': boolean,
    'works_on_saturday': boolean,
    'joining_date': Date,
    'resignation_date': Date | null | undefined,
    'has_married_contract': boolean,
    'vacation_class': "0" | "21" | "30",
    'special_needs': boolean,
    'nationality': Resource,
    'sponsorship': Resource,
    'categories': Resource,
    'positions': Resource,
    'departments': Resource,
    'qualification': Resource,
}

interface ResourceList {
    data: Resource[]
}

interface Resource{
    id: string,
    name: string
}

export interface EmployeeListProps {
    employees: {
        data: Employee[],
    },
    genders: ResourceList,
    status: ResourceList,
    departments: ResourceList,
    categories: ResourceList,
    countries: ResourceList,
    sponsorships: ResourceList,
    qualifications: ResourceList
}
