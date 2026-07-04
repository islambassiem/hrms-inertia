import { Link, router } from "@inertiajs/react";
import { Plus, Search, SearchX, X } from "lucide-react";
import { useEffect, useRef, useState } from "react";
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
import { Input } from "@/components/ui/input";
import Pagination from "@/components/ui/Pagination";
import { useDebounce } from "@/hooks/useDebounce";
import { index } from "@/routes/hr/employees";
import type { Resource } from "@/types";
import type { DepartmentList, EmployeeList } from "@/types/hr";

interface PageProps {
    employees: Resource<EmployeeList>;
    filters: {
        search?: string;
        page?: number;
    };
    departments: DepartmentList;
    colleges: DepartmentList;
    entities: DepartmentList;
}

const Index = ({
    employees,
    filters,
    departments,
    colleges,
    entities
}: PageProps) => {
    const { t } = useTranslation();

    const search = filters.search ?? "";
    const [searchValue, setSearchValue] = useState(search);
    const debouncedValue = useDebounce(searchValue);

    const handleSearchChange = (value: string) => {
        setSearchValue(value);
    };
    const isFirstRender = useRef(true);

    useEffect(() => {
        if (isFirstRender.current) {
            isFirstRender.current = false;

            return;
        }

        const params = new URLSearchParams(window.location.search);
        router.get(
            index.url(),
            {
                page: 1,
                ...Object.fromEntries(params.entries()),
                search: debouncedValue || undefined,
            },
            {
                preserveState: true,
                replace: true,
                preserveScroll: true,
            }
        );
    }, [debouncedValue]);

    const handleReset = () => {
        setSearchValue('');
        router.get(
            index.url(),
            {},
            {
                preserveState: true,
                replace: true,
                preserveScroll: true,
            }
        );
    };

    return (
        <div>
            <div className="relative max-w-2xs mt-10 mx-3">
                <Search className="absolute left-3 rtl:right-3 top-1/2 h-4 w-4 -translate-y-1/2 text-muted-foreground" />

                <Input
                    placeholder={t("Search") + "..."}
                    className="ps-10"
                    value={searchValue}
                    onChange={(e) => handleSearchChange(e.target.value)}
                />

                {(search?.length ?? 0) > 0 && (
                    <button
                        onClick={handleReset}
                        className="absolute right-3 rtl:right-auto rtl:left-3 top-1/2 -translate-y-1/2 px-2"
                    >
                        <X className="text-destructive cursor-pointer size-3" />
                    </button>
                )}
            </div>
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
                        <FilterDrawer
                            departments={departments}
                            colleges={colleges}
                            entities={entities}
                        />
                        <Button asChild>
                            <Link href="/employees/add">
                                <Plus className="mr-2 h-4 w-4" />
                                {t('Add Employee')}
                            </Link>
                        </Button>
                    </div>
                </div>
                {employees.data.length === 0 ? (
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
                        {employees.data.map(employee => (
                            <EmployeeCard
                                key={employee.id}
                                employee={employee.attributes}
                            />
                        ))}
                    </div>
                )}
                {employees.meta.per_page < employees.meta.total && (
                    <Pagination meta={employees.meta} links={employees.links} />
                )}
            </div>
        </div>
    );
};

export default Index;


