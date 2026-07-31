import { Head, router } from '@inertiajs/react';
import { Search, X } from 'lucide-react';
import { useEffect, useRef, useState } from 'react';
import { useTranslation } from 'react-i18next';

import ContactCard from '@/components/home/ContactCard';
import { Input } from '@/components/ui/input';
import Pagination from '@/components/ui/Pagination';
import { useDebounce } from '@/hooks/useDebounce';
import { index } from '@/routes/contacts';
import type { Resource } from '@/types';
import type { Employee } from '@/types/types';

interface PageProps {
    employees: Resource<Employee>;
    filters: {
        search: string;
    };
}

const Contacts = ({ employees, filters }: PageProps) => {
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
        <>
            <Head title="Contacts" />

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

            <section className="mx-3 grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                {employees.data.map((employee) => (
                    <ContactCard
                        key={employee.id}
                        employee={employee.attributes}
                    />
                ))}
            </section>

            {employees.meta.per_page < employees.meta.total && (
                <Pagination meta={employees.meta} links={employees.links} />
            )}
        </>
    );
};

export default Contacts;
