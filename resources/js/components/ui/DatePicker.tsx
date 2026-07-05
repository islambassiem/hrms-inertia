import { format } from "date-fns"
import { ar } from "date-fns/locale";
import { enGB } from "date-fns/locale";

import { Button } from "@/components/ui/button"
import { Calendar } from "@/components/ui/calendar"
import { Field, FieldLabel } from "@/components/ui/field"
import {
    Popover,
    PopoverContent,
    PopoverTrigger,
} from "@/components/ui/popover"
import { usePage } from "@inertiajs/react";

interface DatePickerProps {
    label?: string,
    title: string,
    value?: Date;
    minDate?: Date;
    maxDate?: Date;
    onChange: (date: Date | undefined) => void;
}
export function DatePicker({
    label,
    title,
    minDate,
    maxDate,
    value,
    onChange
}: DatePickerProps) {
    const { locale } = usePage<{ locale: string }>().props;

    return (
        <Field className="w-44">
            <FieldLabel htmlFor="date-picker-simple">{label}</FieldLabel>
            <Popover>
                <PopoverTrigger className="text-left rtl:text-right">
                    <Button
                        variant="outline"
                        id="date-picker-simple"
                        className="font-normal w-40"
                    >{value ? format(value, "PPP") : <span>{title}</span>}
                    </Button>
                </PopoverTrigger>
                <PopoverContent className="w-auto p-0" align="start">
                    <Calendar
                        mode="single"
                        selected={value}
                        onSelect={onChange}
                        className="rounded-lg border"
                        captionLayout="dropdown"
                        defaultMonth={new Date()}
                        startMonth={new Date(2000, 0)}
                        locale={locale === "ar" ? ar : enGB}
                        disabled={(date) => {
                            if (minDate && date < minDate) return true;
                            if (maxDate && date > maxDate) return true;
                            return false;
                        }}
                    />
                </PopoverContent>
            </Popover>
        </Field>
    )
}
