export interface EmployeeList {
    id: number;
    employee_code: string;
    name_en: string;
    name_ar: string;
    email: number;
    extentions: string[];
    phone: string;
    image?: string;
    is_active: boolean;
    joining_date: string;
    leaving_date: string;
    depatment: string;
    national_id: string;
}

export interface ResourceList {
    data: {
        id: number;
        name: string;
    }[];
}

export interface EmployeeHeaderProps {
    data: {
        id: number;
        employee_code: string;
        profile: {
            full_name: string;
            image: string;
        };
        department: string;
        email: string;
        job_title: string;
        joining_date: string;
        is_active: boolean;
    };
}
