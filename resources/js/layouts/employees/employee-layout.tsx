import type { PropsWithChildren } from 'react';

import EmployeeHeader from '@/components/Employees/EmployeeHeader';
import EmployeeNavigation from '@/components/Employees/EmployeeNavigation';
import type { EmployeeHeaderProps } from '@/types/hr';

interface Props extends PropsWithChildren {
    employee: EmployeeHeaderProps;
}

export default function EmployeeLayout({ employee, children }: Props) {
    return (
        <div className="space-y-6">
            <EmployeeHeader employee={employee} />
            <EmployeeNavigation employee={employee} />
            <main className="rounded-xl border bg-background p-6">
                {children}
            </main>
        </div>
    );
}
