import { Link } from "@inertiajs/react";
import { Plus, SearchX } from "lucide-react";
import { useTranslation } from "react-i18next";

import EmployeeCard from "@/components/Employees/EmployeeCard";
import FilterDrawer from "@/components/Employees/FilterDrawer";
import { Button } from "@/components/ui/button";
import {
    Empty,
    EmptyContent,
    EmptyDescription,
    EmptyHeader,
    EmptyMedia,
    EmptyTitle,
} from "@/components/ui/empty";

const Index = ({ employees }: { employees: any[] }) => {
    const { t } = useTranslation();
    console.log(employees);


    return (
        <div className="space-y-6 p-6">
            <div className="flex items-center justify-between">
                <div>
                    <h1 className="text-3xl font-bold">
                        {t('Employees')}
                    </h1>
                    <p className="text-muted-foreground">
                        248 {t('Employees')}
                    </p>
                </div>
                <div className="flex gap-2">
                    <FilterDrawer />
                    <Button asChild>
                        <Link href="/employees/add">
                            <Plus className="mr-2 h-4 w-4" />
                            {t('Add Employee')}
                        </Link>
                    </Button>
                </div>
            </div>
            {employees.length === 0 ? (
                <Empty className="border border-dashed">
                    <EmptyHeader>
                        <EmptyMedia variant="icon">
                            <SearchX />
                        </EmptyMedia>
                        <EmptyTitle>{t('No Employees Found')}</EmptyTitle>
                        <EmptyDescription>
                            {t('Update your filters or create a new employee')}.
                        </EmptyDescription>
                    </EmptyHeader>
                    <EmptyContent>
                        <Button asChild>
                            <Link href="/employees/add">
                                <Plus className="mr-2 h-4 w-4" />
                                {t('Add Employee')}
                            </Link>
                        </Button>
                    </EmptyContent>
                </Empty>
            ) : (
                <div className="grid gap-5 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    {employees.map(employee => (
                        <EmployeeCard
                            key={employee.id}
                            employee={employee}
                        />
                    ))}
                </div>

            )}
        </div>
    );
};

export default Index;


