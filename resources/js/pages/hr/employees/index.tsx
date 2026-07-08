import { Link, router } from '@inertiajs/react';
import { Plus, Search, SearchX, X } from 'lucide-react';
import { useEffect, useRef, useState } from 'react';
import { useTranslation } from 'react-i18next';
import EmployeeCard from '@/components/Employees/EmployeeCard';
import FilterDrawer from '@/components/Employees/FilterDrawer';
import { Button } from '@/components/ui/button';
import {
    Empty,
    EmptyContent,
    EmptyDescription,
    EmptyHeader,
    EmptyMedia,
    EmptyTitle,
} from '@/components/ui/empty';
import { Input } from '@/components/ui/input';
import Pagination from '@/components/ui/Pagination';
import { useDebounce } from '@/hooks/useDebounce';
import { index } from '@/routes/hr/employees';
import type { Resource } from '@/types';
import type { ResourceList, EmployeeList } from '@/types/hr';

interface PageProps {
    employees: Resource<EmployeeList>;
    employeesCount: number;
    filters: {
        search?: string;
        page?: number;
    };
    departments: ResourceList;
    colleges: ResourceList;
    entities: ResourceList;
    categories: ResourceList;
    academicRanks: ResourceList;
    sponsorships: ResourceList;
    positions: ResourceList;
    nationalities: ResourceList;
    genders: ResourceList;
}

const Index = ({
    employees,
    employeesCount,
    filters,
    departments,
    colleges,
    entities,
    categories,
    academicRanks,
    sponsorships,
    positions,
    nationalities,
    genders,
}: PageProps) => {
    const { t } = useTranslation();

    const search = filters.search ?? '';
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
            },
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
            },
        );
    };

    return (
        <div>
            <div className="relative mx-3 mt-10 max-w-2xs">
                <Search className="absolute top-1/2 left-3 h-4 w-4 -translate-y-1/2 text-muted-foreground rtl:right-3" />

                <Input
                    placeholder={t('Search') + '...'}
                    className="ps-10"
                    value={searchValue}
                    onChange={(e) => handleSearchChange(e.target.value)}
                />

                {(search?.length ?? 0) > 0 && (
                    <button
                        onClick={handleReset}
                        className="absolute top-1/2 right-3 -translate-y-1/2 px-2 rtl:right-auto rtl:left-3"
                    >
                        <X className="size-3 cursor-pointer text-destructive" />
                    </button>
                )}
            </div>
            <div className="space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold">{t('Employees')}</h1>
                        <p className="text-muted-foreground">
                            {employeesCount} {t('Employee')}
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <FilterDrawer
                            departments={departments}
                            colleges={colleges}
                            entities={entities}
                            categories={categories}
                            academicRanks={academicRanks}
                            sponsorships={sponsorships}
                            positions={positions}
                            nationalities={nationalities}
                            genders={genders}
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
                                {t(
                                    'Update your filters or create a new employee',
                                )}
                                .
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
                    <div className="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        {employees.data.map((employee) => (
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
