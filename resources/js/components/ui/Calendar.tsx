import React, { useState, useRef, useEffect, JSX } from 'react';
import { CiCalendar } from "react-icons/ci";
import { BsChevronLeft, BsChevronRight } from "react-icons/bs";
import { useLanguage } from '@/hooks/useLanguage';
import { t } from 'i18next';

// Type definitions
interface CalendarProps {
    selectedDate?: Date | null;
    onDateSelect: (date: Date | null) => void;
    placeholder?: string;
    minDate?: Date;
    maxDate?: Date;
    disabled?: boolean;
    className?: string;
}

// interface CalendarComponentProps extends CalendarProps { }

const CalendarComponent: React.FC<CalendarProps> = ({
    selectedDate = null,
    onDateSelect,
    placeholder = "Select date",
    minDate,
    maxDate,
    disabled = false,
    className = ""
}) => {
    const [isOpen, setIsOpen] = useState<boolean>(false);
    const [currentMonth, setCurrentMonth] = useState<number>(
        selectedDate ? selectedDate.getMonth() : new Date().getMonth()
    );
    const [currentYear, setCurrentYear] = useState<number>(
        selectedDate ? selectedDate.getFullYear() : new Date().getFullYear()
    );
    const [yearInput, setYearInput] = useState<string>('');
    const [isEditingYear, setIsEditingYear] = useState<boolean>(false);
    const { language } = useLanguage();

    const calendarRef = useRef<HTMLDivElement>(null);
    const yearInputRef = useRef<HTMLInputElement>(null);

    const months: string[] = language === 'ar'
        ? ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو',
            'يوليو', 'اغسطس', 'سبتمبر', 'اكتوبر', 'نوفمبر', 'ديسمبر']
        : [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

    const weekdays: string[] = language === 'ar'
        ? ['الاحد', 'الاثنين', 'الثلاثاء', 'الاربعاء', 'الخميس', 'الجمعة', 'السبت']
        : ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

    // Handle clicking outside calendar
    useEffect(() => {
        const handleClickOutside = (event: MouseEvent) => {
            if (calendarRef.current && !calendarRef.current.contains(event.target as Node)) {
                setIsOpen(false);
                setIsEditingYear(false);
            }
        };

        if (isOpen) {
            document.addEventListener('mousedown', handleClickOutside);
        }

        return () => {
            document.removeEventListener('mousedown', handleClickOutside);
        };
    }, [isOpen]);

    // Focus year input when editing starts
    useEffect(() => {
        if (isEditingYear && yearInputRef.current) {
            yearInputRef.current.focus();
            yearInputRef.current.select();
        }
    }, [isEditingYear]);

    const getDaysInMonth = (month: number, year: number): number => {
        return new Date(year, month + 1, 0).getDate();
    };

    const getFirstDayOfMonth = (month: number, year: number): number => {
        return new Date(year, month, 1).getDay();
    };

    const isDateDisabled = (date: Date): boolean => {
        if (minDate && date < minDate) return true;
        if (maxDate && date > maxDate) return true;
        return false;
    };

    const handleDateClick = (day: number): void => {
        if (disabled) return;

        const newDate = new Date(currentYear, currentMonth, day + 1);
        if (isDateDisabled(newDate)) return;

        onDateSelect(newDate);
        setIsOpen(false);
    };

    const handlePrevMonth = (): void => {
        if (currentMonth === 0) {
            setCurrentMonth(11);
            setCurrentYear(currentYear - 1);
        } else {
            setCurrentMonth(currentMonth - 1);
        }
    };

    const handleNextMonth = (): void => {
        if (currentMonth === 11) {
            setCurrentMonth(0);
            setCurrentYear(currentYear + 1);
        } else {
            setCurrentMonth(currentMonth + 1);
        }
    };

    const handleYearEdit = (): void => {
        setIsEditingYear(true);
        setYearInput(currentYear.toString());
    };

    const handleYearSubmit = (): void => {
        const year = parseInt(yearInput, 10);
        if (year && year >= 1900 && year <= 2100) {
            setCurrentYear(year);
        }
        setIsEditingYear(false);
        setYearInput('');
    };

    const handleYearKeyPress = (e: React.KeyboardEvent<HTMLInputElement>): void => {
        if (e.key === 'Enter') {
            handleYearSubmit();
        } else if (e.key === 'Escape') {
            setIsEditingYear(false);
            setYearInput('');
        }
    };

    const formatDate = (date: Date | null): string => {
        if (!date) return '';
        return date.toLocaleDateString(language, {
            year: 'numeric',
            month: 'short',
            day: 'numeric'
        });
    };

    const handleClearClick = (): void => {
        onDateSelect(null);
    }

    const renderCalendarDays = (): JSX.Element[] => {
        const daysInMonth = getDaysInMonth(currentMonth, currentYear);
        const firstDay = getFirstDayOfMonth(currentMonth, currentYear);
        const days: JSX.Element[] = [];

        // Empty cells for days before the first day of the month
        for (let i = 0; i < firstDay; i++) {
            days.push(<div key={`empty-${i}`} className="w-10 h-10"></div>);
        }

        // Days of the month
        for (let day = 1; day <= daysInMonth; day++) {
            const date = new Date(currentYear, currentMonth, day, 12, 0, 0, 0);
            const isSelected = selectedDate &&
                selectedDate.getDate() === day &&
                selectedDate.getMonth() === currentMonth &&
                selectedDate.getFullYear() === currentYear;

            // Compare dates properly by normalizing to same time
            const today = new Date();
            const todayNormalized = new Date(today.getFullYear(), today.getMonth(), today.getDate());
            const dateNormalized = new Date(currentYear, currentMonth, day);
            const isToday = todayNormalized.getTime() === dateNormalized.getTime();

            const isDayDisabled = isDateDisabled(date);

            days.push(
                <button
                    key={day}
                    onClick={() => handleDateClick(day)}
                    disabled={isDayDisabled || disabled}
                    className={`
            w-10 h-10 rounded-lg text-sm font-medium transition-all duration-200
            ${isDayDisabled || disabled
                            ? 'text-gray-300 cursor-not-allowed'
                            : 'hover:bg-blue-100 hover:text-primary hover:scale-105'
                        }
            ${isSelected
                            ? 'bg-blue-500 text-white shadow-lg scale-105'
                            : isToday && !isDayDisabled
                                ? 'bg-blue-50 text-primary ring-2 ring-primary/20'
                                : !isDayDisabled && !disabled
                                    ? 'text-text hover:shadow-md'
                                    : 'text-gray-300'
                        }
          `}
                >
                    {day}
                </button>
            );
        }

        return days;
    };

    const handleTodayClick = (): void => {
        const today = new Date();
        setCurrentMonth(today.getMonth());
        setCurrentYear(today.getFullYear());

        if (!isDateDisabled(today)) {
            onDateSelect(today);
        }
        setIsOpen(false);
    };

    return (
        <div className={`relative ${className}`} ref={calendarRef}>
            {/* Trigger Button */}
            <button
                onClick={() => !disabled && setIsOpen(!isOpen)}
                disabled={disabled}
                className={`
                    flex items-center gap-3 px-4 py-3 bg-surface  border  border-border rounded-lg shadow-sm
                    transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary
                    focus:border-transparent min-w-48
                ${disabled
                        ? 'cursor-not-allowed opacity-50'
                        : 'hover:border-primary hover:shadow-md'
                    }
            `}
            >
                <CiCalendar className="w-5 h-5 text-gray-500" />
                <span className={selectedDate ? 'text-text' : 'text-muted'}>
                    {selectedDate ? formatDate(selectedDate) : placeholder}
                </span>
            </button>

            {/* Calendar Dropdown */}
            {isOpen && !disabled && (
                <div className="absolute top-full left-0 rtl:left-auto rtl:right-0 mt-2 bg-surface border border-border rounded-xl shadow-2xl z-50 p-6 min-w-[450px]">
                    {/* Header */}
                    <div className="flex items-center justify-between mb-6 ">
                        <button
                            onClick={handlePrevMonth}
                            className="p-2 rounded-lg hover:bg-text-secondary/10 transition-colors duration-200"
                            type="button"
                        >
                            <BsChevronLeft className={`w-5 h-5 text-muted ${language === 'ar' && 'rotate-180'}`} />
                        </button>

                        <div className="flex items-center gap-2">
                            <select
                                value={currentMonth}
                                onChange={(e: React.ChangeEvent<HTMLSelectElement>) => setCurrentMonth(parseInt(e.target.value, 10))}
                                className="text-lg font-semibold text-muted bg-transparent border-none focus:outline-none focus:ring-2 focus:ring-primary/10 focus:bg-primary/10 rounded-md px-2 py-1 cursor-pointer hover:bg-primary-hover/30 transition-colors duration-200"
                            >
                                {months.map((month: string, index: number) => (
                                    <option key={month} value={index} className="text-base font-normal ">
                                        {month}
                                    </option>
                                ))}
                            </select>
                            {isEditingYear ? (
                                <input
                                    ref={yearInputRef}
                                    type="number"
                                    value={yearInput}
                                    onChange={(e: React.ChangeEvent<HTMLInputElement>) => setYearInput(e.target.value)}
                                    onBlur={handleYearSubmit}
                                    onKeyDown={handleYearKeyPress}
                                    className="w-20 px-2 py-1 text-lg font-semibold text-center border border-border rounded-md focus:outline-none focus:ring-2 focus:ring-primary/30 hover:bg-primary-hover/30 transition-colors duration-200"
                                    min="1900"
                                    max="2100"
                                />
                            ) : (
                                <button
                                    onClick={handleYearEdit}
                                    className="text-lg font-semibold text-text hover:text-primary/30 hover:bg-primary-hover/30 px-2 py-1 rounded-md transition-colors duration-200"
                                    title="Click to edit year"
                                    type="button"
                                >
                                    {currentYear}
                                </button>
                            )}
                        </div>

                        <button
                            onClick={handleNextMonth}
                            className="p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200"
                            type="button"
                        >
                            <BsChevronRight className={`w-5 h-5 text-muted ${language === 'ar' && 'rotate-180'}`} />
                        </button>
                    </div>

                    {/* Weekday Headers */}
                    <div className="grid grid-cols-7 gap-1 mb-2">
                        {weekdays.map((day: string) => (
                            <div key={day} className="text-center text-sm font-medium text-text py-2">
                                {day}
                            </div>
                        ))}
                    </div>

                    {/* Calendar Grid */}
                    <div className="grid grid-cols-7 gap-1">
                        {renderCalendarDays()}
                    </div>

                    {/* Footer */}
                    <div className="flex justify-between items-center mt-4 pt-4 border-t border-border">
                        <button
                            onClick={handleTodayClick}
                            className="text-sm text-primary hover:text-text hover:bg-primary-subtle px-3 py-1 rounded-md transition-colors duration-200"
                            type="button"
                        >
                            {t('Today')}
                        </button>
                        <button
                            onClick={handleClearClick}
                            className="text-sm text-primary hover:text-text hover:bg-primary-subtle px-3 py-1 rounded-md transition-colors duration-200"
                            type="button"
                        >
                            {t('Clear')}
                        </button>
                    </div>
                </div>
            )}
        </div>
    );
};


export default CalendarComponent;
