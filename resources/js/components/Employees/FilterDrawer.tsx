import { useForm, usePage } from '@inertiajs/react';
import { format } from 'date-fns';
import {
    BookOpen,
    Briefcase,
    CalendarCheck2,
    CalendarX2,
    Crown,
    Flag,
    GitBranch,
    GraduationCap,
    ShieldCheck,
    SlidersHorizontal,
    Tag,
    ToggleRight,
    VenusAndMars,
} from 'lucide-react';
import { useState } from 'react';
import { useTranslation } from 'react-i18next';
import { Button } from '@/components/ui/button';
import {
    Sheet,
    SheetContent,
    SheetDescription,
    SheetHeader,
    SheetTitle,
    SheetTrigger,
} from '@/components/ui/sheet';
import { index } from '@/routes/hr/employees';
import type { ResourceList } from '@/types/hr';
import DateRange from '../ui/DateRange';
import { MultiSelect } from '../ui/MultiSelect';

interface FilterDrawerProps {
    departments: ResourceList;
    colleges: ResourceList;
    entities: ResourceList;
    categories: ResourceList;
    academicRanks: ResourceList;
    sponsorships: ResourceList;
    positions: ResourceList;
    nationalities: ResourceList;
    genders: ResourceList;
    statuses: ResourceList;
}

type EmployeeFilters = {
    entities: number[];
    colleges: number[];
    departments: number[];
    categories: number[];
    academicRanks: number[];
    sponsorships: number[];
    positions: number[];
    nationalities: number[];
    genders: number[];
    statuses: number[];

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
    academicRanks,
    sponsorships,
    positions,
    nationalities,
    genders,
    statuses,
}: FilterDrawerProps) => {
    const { t } = useTranslation();
    const { locale } = usePage().props;
    const [open, setOpen] = useState(false);

    const initialData = {
        entities: [],
        colleges: [],
        departments: [],
        categories: [],
        academicRanks: [],
        sponsorships: [],
        positions: [],
        nationalities: [],
        genders: [],
        statuses: [],
        joining: {},
        resignation: {},
    };

    const { data, setData, get, transform } =
        useForm<EmployeeFilters>(initialData);

    const departmentDropDown = departments.data.map(
        (department) => department.attributes,
    );
    const collegeDropDown = colleges.data.map((college) => college.attributes);
    const entityDropDown = entities.data.map((entity) => entity.attributes);
    const categoryDropDown = categories.data.map(
        (category) => category.attributes,
    );
    const academicRankDropDown = academicRanks.data.map(
        (academicRank) => academicRank.attributes,
    );
    const sponsorshipDropDown = sponsorships.data.map(
        (sponsorship) => sponsorship.attributes,
    );
    const positionDropDown = positions.data.map(
        (position) => position.attributes,
    );
    const nationalityDropDown = nationalities.data.map(
        (nationality) => nationality.attributes,
    );
    const gendersDropDown = genders.data.map((gender) => gender.attributes);
    const statusesDropDown = statuses.data.map((status) => status.attributes);

    const handleFilters = () => {
        get(index.url(), {
            preserveState: true,
            preserveScroll: true,
            onSuccess: () => {
                setOpen(false);
            },
        });
    };

    const handleClearFilters = () => {
        setData(initialData);
        get(index.url(), {
            preserveState: true,
            preserveScroll: true,
            onSuccess: () => {
                setOpen(false);
            },
        });
    };

    transform((data) => ({
        ...data,
        joining: {
            ...data.joining,
            from: data.joining.from
                ? format(data.joining.from, 'yyyy-MM-dd')
                : undefined,
            to: data.joining.to
                ? format(data.joining.to, 'yyyy-MM-dd')
                : undefined,
        },
        resignation: {
            ...data.resignation,
            from: data.resignation.from
                ? format(data.resignation.from, 'yyyy-MM-dd')
                : undefined,
            to: data.resignation.to
                ? format(data.resignation.to, 'yyyy-MM-dd')
                : undefined,
        },
    }));

    const updateDateRange = (
        key: 'joining' | 'resignation',
        value: Partial<EmployeeFilters[typeof key]>,
    ) => {
        setData(key, {
            ...data[key],
            ...value,
        });
    };

    return (
        <>
            <Sheet open={open} onOpenChange={setOpen}>
                <SheetTrigger asChild>
                    <Button variant="outline">
                        <SlidersHorizontal className="mr-2 h-4 w-4" />
                        {t('Filters')}
                    </Button>
                </SheetTrigger>

                <SheetContent
                    className="w-105 overflow-y-auto [&>button]:last:rtl:right-auto [&>button]:last:rtl:left-4"
                    side={locale === 'en' ? 'right' : 'left'}
                >
                    <SheetHeader>
                        <SheetTitle>{t('Employee Filters')}</SheetTitle>
                        <SheetDescription>
                            {t('Search employees using different parameters')}.
                        </SheetDescription>
                    </SheetHeader>

                    <div className="mx-4 mt-6 flex-1 space-y-5">
                        <MultiSelect
                            showSelectAll
                            options={entityDropDown}
                            value={data.entities}
                            onValueChange={(v) => setData('entities', v)}
                        >
                            <Briefcase />
                            {t('Entity')}
                        </MultiSelect>

                        <MultiSelect
                            showSelectAll
                            options={collegeDropDown}
                            value={data.colleges}
                            onValueChange={(v) => setData('colleges', v)}
                        >
                            <GraduationCap />
                            {t('College')}
                        </MultiSelect>

                        <MultiSelect
                            showSelectAll
                            options={departmentDropDown}
                            value={data.departments}
                            onValueChange={(v) => setData('departments', v)}
                        >
                            <GitBranch />
                            {t('Department')}
                        </MultiSelect>

                        <MultiSelect
                            showSelectAll
                            options={categoryDropDown}
                            value={data.categories}
                            onValueChange={(v) => setData('categories', v)}
                        >
                            <Tag />
                            {t('Category')}
                        </MultiSelect>

                        <MultiSelect
                            showSelectAll
                            options={academicRankDropDown}
                            value={data.academicRanks}
                            onValueChange={(v) => setData('academicRanks', v)}
                        >
                            <BookOpen />
                            {t('Rank')}
                        </MultiSelect>

                        <MultiSelect
                            showSelectAll
                            options={sponsorshipDropDown}
                            value={data.sponsorships}
                            onValueChange={(v) => setData('sponsorships', v)}
                        >
                            <ShieldCheck />
                            {t('Sponsorship')}
                        </MultiSelect>

                        <MultiSelect
                            showSelectAll
                            options={positionDropDown}
                            value={data.positions}
                            onValueChange={(v) => setData('positions', v)}
                        >
                            <Crown />
                            {t('Position')}
                        </MultiSelect>

                        <MultiSelect
                            showSelectAll
                            options={nationalityDropDown}
                            value={data.nationalities}
                            onValueChange={(v) => setData('nationalities', v)}
                        >
                            <Flag />
                            {t('Nationality')}
                        </MultiSelect>

                        <MultiSelect
                            showSelectAll
                            options={gendersDropDown}
                            value={data.genders}
                            onValueChange={(v) => setData('genders', v)}
                        >
                            <VenusAndMars />
                            {t('Gender')}
                        </MultiSelect>

                        <MultiSelect
                            showSelectAll
                            options={statusesDropDown}
                            value={data.statuses}
                            onValueChange={(v) => setData('statuses', v)}
                        >
                            <ToggleRight />
                            {t('Status')}
                        </MultiSelect>

                        <DateRange
                            title={t('Joining Date')}
                            description={t(
                                'The staff who joined between these dates',
                            )}
                            icon={CalendarCheck2}
                            startDate={data.joining.from}
                            endDate={data.joining.to}
                            setStartDate={(from) =>
                                updateDateRange('joining', { from })
                            }
                            setEndDate={(to) =>
                                updateDateRange('joining', { to })
                            }
                        />

                        <DateRange
                            title={t('Leaving Date')}
                            description={t(
                                'The staff who resigned between these dates',
                            )}
                            icon={CalendarX2}
                            startDate={data.resignation.from}
                            endDate={data.resignation.to}
                            setStartDate={(from) =>
                                updateDateRange('resignation', { from })
                            }
                            setEndDate={(to) =>
                                updateDateRange('resignation', { to })
                            }
                        />
                    </div>
                    <div className="mx-5 flex gap-2 py-4">
                        <Button
                            variant="outline"
                            className="flex-1"
                            onClick={handleClearFilters}
                        >
                            {t('Clear')}
                        </Button>
                        <Button className="flex-1" onClick={handleFilters}>
                            {t('Apply Filters')}
                        </Button>
                    </div>
                </SheetContent>
            </Sheet>
        </>
    );
};

export default FilterDrawer;
