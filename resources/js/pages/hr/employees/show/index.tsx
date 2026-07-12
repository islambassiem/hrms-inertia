import AppLayout from "@/layouts/app-layout";
import EmployeeLayout from "@/layouts/employees/employee-layout";

interface Employee {
    data: {
        employee_code: string;
        full_name_en: string;
        full_name_ar: string;

    }
}

const Index = ({ employee }: { employee: Employee }) => {
    return <div>{employee.data.employee_code}</div>;
};

Index.layout = [AppLayout, EmployeeLayout];
export default Index;


