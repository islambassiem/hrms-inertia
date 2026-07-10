import { BriefcaseBusiness, Building2, CalendarDays, Hash } from 'lucide-react';
import { useContext } from 'react';
import InputError from '@/components/input-error';
import {
    Card,
    CardHeader,
    CardTitle,
    CardDescription,
    CardContent,
} from '@/components/ui/card';
import { Input } from '@/components/ui/input';

import {
    Select,
    SelectTrigger,
    SelectValue,
    SelectContent,
    SelectItem,
} from '@/components/ui/select';

import type { EmployeeFormContextType } from '@/contexts/EmployeeFormContext';
import { EmployeeFormContext } from '@/contexts/EmployeeFormContext';

interface Props {
    values: {
        employee_code: string;
        department_id: string;
        category_id: string;
        joining_date: string;
    };
    errors: {
        employee_code?: string;
        department_id?: string;
        category_id?: string;
        joining_date?: string;
    };
    setData: (field: string, value: string | number) => void;
}

export default function BasicInformation({ values, errors, setData }: Props) {
    const reference: EmployeeFormContextType | undefined =
        useContext(EmployeeFormContext);

    return (
        <Card>
            <CardHeader>
                <CardTitle className="flex items-center gap-2">
                    <BriefcaseBusiness className="h-5 w-5" />
                    Basic Information
                </CardTitle>
                <CardDescription>
                    Employee code and organizational information.
                </CardDescription>
            </CardHeader>
            <CardContent className="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">
                {/* Employee Code */}
                <div className="space-y-2">
                    <label className="text-sm font-medium">Employee Code</label>
                    <div className="relative">
                        <Hash className="absolute inset-s-3 top-1/2 h-4 w-4 -translate-y-1/2 text-muted-foreground" />
                        <Input
                            value={values.employee_code}
                            onChange={(e) =>
                                setData('employee_code', e.target.value)
                            }
                            className="ps-10"
                        />
                    </div>
                    <InputError message={errors.employee_code} />
                </div>

                {/* Department */}

                <div className="space-y-2">
                    <label className="text-sm font-medium">Department</label>

                    <Select
                        value={values.department_id}
                        onValueChange={(value) =>
                            setData('department_id', value)
                        }
                    >
                        <SelectTrigger>
                            <Building2 className="me-2 h-4 w-4 text-muted-foreground" />
                            <SelectValue placeholder="Select department" />
                        </SelectTrigger>
                        <SelectContent>
                            {reference?.departments.data.map((department) => (
                                <SelectItem
                                    key={department.id}
                                    value={String(department.id)}
                                >
                                    {department.attributes.name}
                                </SelectItem>
                            ))}
                        </SelectContent>
                    </Select>
                    <InputError message={errors.department_id} />
                </div>

                {/* Category */}
                <div className="space-y-2">
                    <label className="text-sm font-medium">
                        Employee Category
                    </label>
                    <Select
                        value={values.category_id}
                        onValueChange={(value) => setData('category_id', value)}
                    >
                        <SelectTrigger>
                            <BriefcaseBusiness className="me-2 h-4 w-4 text-muted-foreground" />
                            <SelectValue placeholder="Select category" />
                        </SelectTrigger>
                        <SelectContent>
                            {reference?.categories.data.map((category) => (
                                <SelectItem
                                    key={category.id}
                                    value={String(category.id)}
                                >
                                    {category.attributes.name}
                                </SelectItem>
                            ))}
                        </SelectContent>
                    </Select>
                    <InputError message={errors.category_id} />
                </div>

                <div className="space-y-2">
                    <label className="text-sm font-medium">Joining Date</label>
                    <div className="relative">
                        <CalendarDays className="absolute inset-s-3 top-1/2 h-4 w-4 -translate-y-1/2 text-muted-foreground" />
                        <Input
                            type="date"
                            className="ps-10"
                            value={values.joining_date}
                            onChange={(e) =>
                                setData('joining_date', e.target.value)
                            }
                        />
                    </div>
                    <InputError message={errors.joining_date} />
                </div>
            </CardContent>
        </Card>
    );
}
