import App from '@/layouts/AppLayout'
import { EmployeesData } from '@/types/hr'

import { usePage } from '@inertiajs/react'

const Employees = () => {
    const { employees } = usePage<EmployeesData>().props;
    console.log(employees);
    return (
        <App>
            <section>
                <div>Employees</div>
                {employees.data.map((employee) => (
                    <div key={employee.id}>{employee.empid}</div>
                ))}
            </section>
        </App>
    );
}

export default Employees
