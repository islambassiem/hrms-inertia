import { Head, router } from "@inertiajs/react";
import { Search, X } from "lucide-react";
import { useTranslation } from "react-i18next";

import ContactCard from "@/components/home/ContactCard";
import { Input } from "@/components/ui/input";
import Pagination from "@/components/ui/Pagination";
import { index } from "@/routes/contacts";
import type { JSONAPIResponse } from "@/types";

interface PageProps {
    employees: JSONAPIResponse;
    filters: {
        search?: string;
        page?: number;
    };
}

const Contacts = ({ employees, filters }: PageProps) => {
    const { t } = useTranslation();

    const search = filters.search ?? "";

    const handleSearchChange = (value: string) => {
        router.get(
            index.url(),
            {
                search: value || undefined,
            },
            {
                preserveState: true,
                replace: true,
                preserveScroll: true,
            }
        );
    };

    const handleReset = () => {
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

    console.log(employees.meta)

    return (
        <>
            <Head title="Contacts" />

            <div className="relative max-w-2xs mt-10 mx-3">
                <Search className="absolute left-3 rtl:right-3 top-1/2 h-4 w-4 -translate-y-1/2 text-muted-foreground" />

                <Input
                    placeholder={t("Search") + "..."}
                    className="ps-10"
                    value={search}
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

            <section className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mx-3">
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
