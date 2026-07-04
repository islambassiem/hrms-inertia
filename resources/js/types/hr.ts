export interface EmployeeList {
    id: string,
    employee_code: string,
    name_en: string,
    name_ar: string,
    email: number,
    extentions: string[],
    phone: string
    image?: string,
    is_active: boolean,
    joining_date: string,
    leaving_date: string,
    depatment: string,
    national_id: string,
}


export interface DepartmentList {
    data: {
        id: string;
        type: string;
        attributes: {
            id: number;
            name: string;
        }
    }[]
}
