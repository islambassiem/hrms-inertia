import {
    Dialog,
    DialogClose,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from "@/components/ui/dialog"
import { Button } from "@/components/ui/button";
import { type LucideIcon } from "lucide-react";
import { useTranslation } from "react-i18next";
import { usePage } from "@inertiajs/react";
import { DatePicker } from "@/components/ui/DatePicker";
import { format } from "date-fns";

interface DateRangeProps {
    title: string;
    description: string;
    icon: LucideIcon;
    startDate: Date | undefined;
    setStartDate: (date: Date | undefined) => void;
    endDate: Date | undefined;
    setEndDate: (date: Date | undefined) => void;
}

const DateRange = ({
    title,
    description,
    icon: Icon,
    startDate,
    setStartDate,
    endDate,
    setEndDate,
}: DateRangeProps) => {
    const { t } = useTranslation();
    const locale = usePage().props.locale;

    return (
        <section>
            <Dialog>
                <DialogTrigger className="flex items-center gap-2">
                    <Button variant="outline" type="button" className="w-36 flex items-center justify-normal gap-3">
                        <Icon  />
                        {title}
                    </Button>
                    <div className="flex items-center gap-2">
                        <span>{startDate && format(startDate, 'dd/MM/yyyy')}</span>
                        {startDate && endDate && <span>-</span>}
                        <span>{endDate && format(endDate, 'dd/MM/yyyy')}</span>
                    </div>
                </DialogTrigger>
                <DialogContent className="sm:max-w-sm" dir={locale === 'en' ? 'ltr' : 'rtl'}>
                    <DialogHeader className="p-4 rtl:text-right">
                        <DialogTitle>{title}</DialogTitle>
                        <DialogDescription>
                            {description}.
                        </DialogDescription>
                    </DialogHeader>
                    <div className="flex gap-2">
                        <div>
                            <span>{t('From')}</span>
                            <DatePicker
                                title={t('From')}
                                value={startDate}
                                onChange={setStartDate}
                                maxDate={endDate}
                            />
                        </div>
                        <div>
                            <span>{t('To')}</span>
                            <DatePicker
                                title={t('To')}
                                value={endDate}
                                onChange={setEndDate}
                                minDate={startDate}
                            />
                        </div>
                    </div>
                    <DialogFooter className="p-4">
                        <DialogClose>
                            <Button variant="outline">Cancel</Button>
                        </DialogClose>
                        <Button type="submit">{t('Save')}</Button>
                    </DialogFooter>
                </DialogContent>
            </Dialog>
        </section>
    );
};

export default DateRange;
