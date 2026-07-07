import {  useForm, usePage } from "@inertiajs/react";
import { BookOpen, Briefcase, CalendarCheck2, CalendarX2, Crown, Flag, GitBranch, GraduationCap, ShieldCheck, SlidersHorizontal, Tag, VenusAndMars } from "lucide-react";
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
import { index } from "@/routes/hr/employees";
import type { ResourceList } from "@/types/hr";
import DateRange from "../ui/DateRange";
import { MultiSelect } from "../ui/MultiSelect";

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
}: FilterDrawerProps) => {

    const { t } = useTranslation();
    const { locale } = usePage().props;
    const { data, setData, get, reset } = useForm<EmployeeFilters>({
        entities: [],
        colleges: [],
        departments: [],
        categories: [],
        academicRanks: [],
        sponsorships: [],
        positions: [],
        nationalities: [],
        genders: [],
        joining: {},
        resignation: {},
    });

    const departmentDropDown = departments.data.map((department) => department.attributes);
    const collegeDropDown = colleges.data.map((college) => college.attributes);
    const entityDropDown = entities.data.map((entity) => entity.attributes);
    const categoryDropDown = categories.data.map((category) => category.attributes);
    const academicRankDropDown = academicRanks.data.map((academicRank) => academicRank.attributes);
    const sponsorshipDropDown = sponsorships.data.map((sponsorship) => sponsorship.attributes);
    const positionDropDown = positions.data.map((position) => position.attributes);
    const nationalityDropDown = nationalities.data.map((nationality) => nationality.attributes);
    const gendersDropDown = genders.data.map((gender) => gender.attributes);

    const handleFilters = () => {
        get(index.url(), {
            preserveState: true,
            preserveScroll: true,
        });
    }

    const updateDateRange = (
        key: "joining" | "resignation",
        value: Partial<EmployeeFilters[typeof key]>
    ) => {
        setData(key, {
            ...data[key],
            ...value,
        });
    };

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
                        value={data.entities}
                        onValueChange={(v) => setData("entities", v)}
                    >
                        <Briefcase />
                        {t('Entity')}
                    </MultiSelect>

                    <MultiSelect
                        showSelectAll
                        options={collegeDropDown}
                        value={data.colleges}
                        onValueChange={(v) => setData("colleges", v)}
                    >
                        <GraduationCap />
                        {t('College')}
                    </MultiSelect>

                    <MultiSelect
                        showSelectAll
                        options={departmentDropDown}
                        value={data.departments}
                        onValueChange={(v) => setData("departments", v)}
                    >
                        <GitBranch />
                        {t('Department')}
                    </MultiSelect>

                    <MultiSelect
                        showSelectAll
                        options={categoryDropDown}
                        value={data.categories}
                        onValueChange={(v) => setData("categories", v)}
                    >
                        <Tag />
                        {t('Category')}
                    </MultiSelect>

                    <MultiSelect
                        showSelectAll
                        options={academicRankDropDown}
                        value={data.academicRanks}
                        onValueChange={(v) => setData("academicRanks", v)}
                    >
                        <BookOpen />
                        {t('Rank')}
                    </MultiSelect>

                    <MultiSelect
                        showSelectAll
                        options={sponsorshipDropDown}
                        value={data.sponsorships}
                        onValueChange={(v) => setData("sponsorships", v)}
                    >
                        <ShieldCheck />
                        {t('Sponsorship')}
                    </MultiSelect>

                    <MultiSelect
                        showSelectAll
                        options={positionDropDown}
                        value={data.positions}
                        onValueChange={(v) => setData("positions", v)}
                    >
                        <Crown />
                        {t('Position')}
                    </MultiSelect>

                    <MultiSelect
                        showSelectAll
                        options={nationalityDropDown}
                        value={data.nationalities}
                        onValueChange={(v) => setData("nationalities", v)}
                    >
                        <Flag />
                        {t('Nationality')}
                    </MultiSelect>

                    <MultiSelect
                        showSelectAll
                        options={gendersDropDown}
                        value={data.genders}
                        onValueChange={(v) => setData("genders", v)}
                    >
                        <VenusAndMars />
                        {t('Gender')}
                    </MultiSelect>

                    <DateRange
                        title={t('Joining Date')}
                        description={t('The staff who joined between these dates')}
                        icon={CalendarCheck2}
                        startDate={data.joining.from}
                        endDate={data.joining.to}
                        setStartDate={(from) => updateDateRange("joining", { from })}
                        setEndDate={(to) => updateDateRange("joining", { to })}
                    />

                    <DateRange
                        title={t('Leaving Date')}
                        description={t('The staff who resigned between these dates')}
                        icon={CalendarX2}
                        startDate={data.resignation.from}
                        endDate={data.resignation.to}
                        setStartDate={(from) => updateDateRange("resignation", { from })}
                        setEndDate={(to) => updateDateRange("resignation", { to })}
                    />

                </div>
                <div className="flex gap-2 py-4 mx-5">
                    <Button
                        variant="outline"
                        className="flex-1"
                        onClick={() => reset()}
                    >
                        {t('Clear')}
                    </Button>
                    <Button className="flex-1" onClick={handleFilters}>
                        {t('Apply Filters')}
                    </Button>
                </div>
            </SheetContent>
        </Sheet>
    </>);
};

export default FilterDrawer;
