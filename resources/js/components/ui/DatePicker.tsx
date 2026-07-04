"use client"

import * as React from "react"
import { format } from "date-fns"
// import 'react-day-picker/dist/style.css';

import { Button } from "@/components/ui/button"
import { Calendar } from "@/components/ui/calendar"
import { Field, FieldLabel } from "@/components/ui/field"
import { DayPicker } from 'react-day-picker';
import {
    Popover,
    PopoverContent,
    PopoverTrigger,
} from "@/components/ui/popover"

export function DatePickerSimple() {
    const [date, setDate] = React.useState<Date | undefined>(new Date())

    return (
        <Field className="w-44">
            <FieldLabel htmlFor="date-picker-simple">Date</FieldLabel>
            <Popover>
                <PopoverTrigger>
                    <Button
                        variant="outline"
                        id="date-picker-simple"
                        className="font-normal"
                    >{date ? format(date, "PPP") : <span>Pick a date</span>}
                    </Button>
                </PopoverTrigger>
                <PopoverContent className="w-auto p-0" align="start">
                    <Calendar
                        mode="single"
                        selected={date}
                        onSelect={setDate}
                        className="rounded-lg border"
                        captionLayout="dropdown-months"
                        defaultMonth={new Date()}
                        showWeekNumber
                    />
                </PopoverContent>
            </Popover>
        </Field>
    )
}
