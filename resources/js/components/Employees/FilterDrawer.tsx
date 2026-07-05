import { usePage } from "@inertiajs/react";
import { Briefcase, CalendarCheck2, CalendarX2, GitBranch, GraduationCap, SlidersHorizontal, Tag } from "lucide-react";
import { useState } from "react";
import { useTranslation } from "react-i18next";
import { Button } from "@/components/ui/button";


import {
    Sheet,
    SheetContent,
    SheetDescription,
    SheetHeader,
    SheetTitle,
    SheetTrigger,
} from "@/components/ui/sheet";

import type { ResourceList } from "@/types/hr";
import DateRange from "../ui/DateRange";
import { MultiSelect } from "../ui/MultiSelect";

interface FilterDrawerProps {
    departments: ResourceList;
    colleges: ResourceList;
    entities: ResourceList;
    categories: ResourceList;
}

type EmployeeFilters = {
    entities: number[];
    colleges: number[];
    departments: number[];
    categories: number[];

    joining: {
        from?: Date;
        to?: Date;
    };

    resignation: {
        from?: Date;
        to?: Date;
    };
};

const FilterDrawer = ({
    departments,
    colleges,
    entities,
    categories,
}: FilterDrawerProps) => {

    const [filters, setFilters] = useState<EmployeeFilters>({
        entities: [],
        colleges: [],
        departments: [],
        categories: [],
        joining: {},
        resignation: {},
    });
    const { t } = useTranslation();
    const { locale } = usePage().props;

    const departmentDropDown = departments.data.map((department) => department.attributes);
    const collegeDropDown = colleges.data.map((college) => college.attributes);
    const entityDropDown = entities.data.map((entity) => entity.attributes);
    const categoryDropDown = categories.data.map((category) => category.attributes);


    const updateFilter = <K extends keyof EmployeeFilters>(
        key: K,
        value: EmployeeFilters[K]
    ) => {
        setFilters((f) => ({
            ...f,
            [key]: value,
        }));
    };

    const updateJoining = (
        value: Partial<EmployeeFilters["joining"]>
    ) => {
        setFilters((f) => ({
            ...f,
            joining: {
                ...f.joining,
                ...value,
            },
        }));
    };

    const updateResignation = (
        value: Partial<EmployeeFilters["resignation"]>
    ) => {
        setFilters((f) => ({
            ...f,
            resignation: {
                ...f.resignation,
                ...value,
            },
        }));
    };
    console.log(filters);

    return (<>
        <Sheet>
            <SheetTrigger asChild>
                <Button variant="outline">
                    <SlidersHorizontal className="mr-2 h-4 w-4" />
                    {t('Filters')}
                </Button>
            </SheetTrigger>

            <SheetContent
                className="w-105 overflow-y-auto [&>button]:last:rtl:left-4 [&>button]:last:rtl:right-auto"
                side={locale === 'en' ? 'right' : 'left'}
            >
                <SheetHeader>
                    <SheetTitle>
                        {t('Employee Filters')}
                    </SheetTitle>
                    <SheetDescription>
                        {t('Search employees using different parameters')}.
                    </SheetDescription>
                </SheetHeader>

                <div className="mt-6 space-y-5 mx-4 flex-1">

                    <MultiSelect
                        showSelectAll
                        options={entityDropDown}
                        value={filters.entities}
                        onValueChange={(v) => updateFilter("entities", v)}
                    >
                        <Briefcase />
                        {t('Entity')}
                    </MultiSelect>

                    <MultiSelect
                        showSelectAll
                        options={collegeDropDown}
                        value={filters.colleges}
                        onValueChange={(v) => updateFilter("colleges", v)}
                    >
                        <GraduationCap />
                        {t('College')}
                    </MultiSelect>

                    <MultiSelect
                        showSelectAll
                        options={departmentDropDown}
                        value={filters.departments}
                        onValueChange={(v) => updateFilter("departments", v)}
                    >
                        <GitBranch />
                        {t('Department')}
                    </MultiSelect>

                    <MultiSelect
                        showSelectAll
                        options={categoryDropDown}
                        value={filters.categories}
                        onValueChange={(v) => updateFilter("categories", v)}
                    >
                        <Tag />
                        {t('Category')}
                    </MultiSelect>

                    <DateRange
                        title={t('Joining Date')}
                        description={t('The staff who joined between these dates')}
                        icon={CalendarCheck2}
                        startDate={filters.joining.from}
                        endDate={filters.joining.to}
                        setStartDate={(from) => updateJoining({ from })}
                        setEndDate={(to) => updateJoining({ to })}
                    />

                    <DateRange
                        title={t('Resignation Date')}
                        description={t('The staff who resigned between these dates')}
                        icon={CalendarX2}
                        startDate={filters.resignation.from}
                        endDate={filters.resignation.to}
                        setStartDate={(from) => updateResignation({ from })}
                        setEndDate={(to) => updateResignation({ to })}
                    />

                </div>
                <div className="flex gap-2 py-4 mx-5">
                    <Button variant="outline" className="flex-1">
                        {t('Clear')}
                    </Button>
                    <Button className="flex-1">
                        {t('Apply Filters')}
                    </Button>
                </div>
            </SheetContent>
        </Sheet>
    </>);
};

export default FilterDrawer;
