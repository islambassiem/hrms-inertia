import { PageProps } from "@inertiajs/core";
export interface EmployeesData extends PageProps {
  employee: Employee;
}

interface Employee {
    'id': number,
    'empid': number ,
    'gender': "male" | "female" | "ذكر" | "انثى",
    'marital_status': boolean,
    'religion': string,
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
    'nationality': Country,
    'sponsorship': Sponsorship,
    'categories': Category[],
    'positions': Position[],
    'departments': Department[],
}

interface Country {
    'id': number,
    'country_en': string,
    'country_ar': string,
}

interface Sponsorship {
    'id': number,
    'sponsorship_en': string,
    'sponsorship_ar': string,
}

interface Category {
    'id': number,
    'category_en': string,
    'category_ar': string,
}

interface Position {
    'id': number,
    'position_en': string,
    'position_ar': string,
}

interface Department {
    'id': number,
    'department_en': string,
    'department_ar': string,
}
