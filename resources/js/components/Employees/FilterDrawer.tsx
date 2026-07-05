import { usePage } from "@inertiajs/react";
import { Building2, GraduationCap, Pyramid, SlidersHorizontal } from "lucide-react";
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
import type { DepartmentList } from "@/types/hr";
import { DatePicker } from "../ui/DatePicker";
import { MultiSelect } from "../ui/MultiSelect";

interface FilterDrawerProps {
    departments: DepartmentList;
    colleges: DepartmentList;
    entities: DepartmentList;
}

const FilterDrawer = ({
    departments,
    colleges,
    entities
}: FilterDrawerProps) => {
    const [selectedDepartments, setSelectedDepartments] = useState<number[]>([]);
    const [selectedColleges, setSelectedColleges] = useState<number[]>([]);
    const [selectedEntities, setSelectedEntities] = useState<number[]>([]);
    const [selectedJoiningStartDate, setSelectedJoiningStartDate] = useState<Date | undefined>();
    const [selectedJoiningEndDate, setSelectedJoiningEndDate] = useState<Date | undefined>();
    const [selectedResignationStartDate, setSelectedResignationStartDate] = useState<Date | undefined>();
    const [selectedResignationEndDate, setSelectedResignationEndDate] = useState<Date | undefined>();
    const { t } = useTranslation();
    const { locale } = usePage().props;

    const departmentDropDown = departments.data.map((department) => department.attributes);
    const collegeDropDown = colleges.data.map((college) => college.attributes);
    const entityDropDown = entities.data.map((entity) => entity.attributes);

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
                        value={selectedEntities}
                        onValueChange={setSelectedEntities}
                    >
                        <Building2 />
                        {t('Entity')}
                    </MultiSelect>

                    <MultiSelect
                        showSelectAll
                        options={collegeDropDown}
                        value={selectedColleges}
                        onValueChange={setSelectedColleges}
                    >
                        <GraduationCap />
                        {t('College')}
                    </MultiSelect>

                    <MultiSelect
                        showSelectAll
                        options={departmentDropDown}
                        value={selectedDepartments}
                        onValueChange={setSelectedDepartments}
                    >
                        <Pyramid />
                        {t('Department')}
                    </MultiSelect>

                    <p className="mb-1">{t('Joining Date')}</p>
                    <div className="flex gap-2">
                        <DatePicker label={t('From')} title={t('From')} value={selectedJoiningStartDate} onChange={setSelectedJoiningStartDate} />
                        <DatePicker label={t('To')} title={t('To')} value={selectedJoiningEndDate} onChange={setSelectedJoiningEndDate}/>
                    </div>

                    <p className="mb-1">{t('Resignation Date')}</p>
                    <div className="flex gap-2">
                        <DatePicker label={t('From')} title={t('From')} value={selectedResignationStartDate} onChange={setSelectedResignationStartDate}/>
                        <DatePicker label={t('To')} title={t('To')} value={selectedResignationEndDate} onChange={setSelectedResignationEndDate}/>
                    </div>

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
