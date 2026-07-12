import { Link } from '@inertiajs/react';
import { Mail, Phone, PhoneForwarded, Eye } from 'lucide-react';
import { useTranslation } from 'react-i18next';
import { Avatar, AvatarImage, AvatarFallback } from '@/components/ui/avatar';

import { Card, CardContent, CardFooter } from '@/components/ui/card';
import { Separator } from '@/components/ui/separator';
import { cn } from '@/lib/utils';
import { show } from '@/routes/hr/employees';
import type { EmployeeList } from '@/types/hr';
import { Badge } from '../ui/badge';
import EmployeeName from './EmployeeName';
import Ribbon from './Ribbon';

export default function EmployeeCard({ employee }: { employee: EmployeeList }) {
    const { t } = useTranslation();
    const isActive = employee.is_active;

    return (
        <Card
            className={cn(
                'relative flex h-full flex-col overflow-hidden pb-4 transition',
                isActive
                    ? 'hover:shadow-lg'
                    : 'border-red-300 border-s-4 border-s-red-600 bg-red-50/50 dark:border-red-900 dark:border-s-red-500 dark:bg-red-950/20',
            )}
        >
            {/* Status Ribbon */}
            <Ribbon
                label={isActive ? t('Active') : t('Inactive')}
                variant={isActive ? 'active' : 'inactive'}
            />

            {/* Watermark */}
            {!isActive && (
                <div className="pointer-events-none absolute inset-0 flex items-center justify-center">
                    <span className="rotate-[-30deg] select-none text-3xl rtl:text-6xl font-black tracking-[0.4em] text-red-500/10 uppercase">
                        {t('Inactive')}
                    </span>
                </div>
            )}

            <CardContent className="relative z-10 flex flex-1 flex-col p-6">
                {/* View Button */}
                <div className="absolute top-4 right-4">
                    <Link href={show(employee.id)}>
                        <Eye className="size-6 hover:text-muted-foreground" />
                    </Link>
                </div>

                {/* Avatar */}
                <div className="flex justify-center">
                    <Avatar
                        className={cn(
                            'h-24 w-24 shadow-md ring-4 ring-background',
                            !isActive && 'grayscale',
                        )}
                    >
                        <AvatarImage src={employee.image} />
                        <AvatarFallback>
                            {employee.name_en?.slice(0, 2)}
                        </AvatarFallback>
                    </Avatar>
                </div>

                {/* Identity */}
                <div
                    className={cn(
                        'mt-4 text-center',
                        !isActive && 'text-muted-foreground line-through',
                    )}
                >
                    <EmployeeName
                        name_en={employee.name_en}
                        name_ar={employee.name_ar}
                    />

                    <p className="mt-1 text-xs text-muted-foreground">
                        {employee.employee_code}
                    </p>

                    <p className="mt-1 text-xs text-muted-foreground">
                        {employee.national_id}
                    </p>
                </div>

                <Separator className="my-5" />

                {/* Contact */}
                <div className="space-y-2 text-sm">
                    <div className="flex items-center gap-2">
                        <Mail className="h-4 w-4 text-muted-foreground" />
                        <span className="truncate">{employee.email}</span>
                    </div>

                    <div className="flex items-center gap-2">
                        <Phone className="h-4 w-4 text-muted-foreground" />
                        <span>{employee.phone}</span>
                    </div>

                    {employee.extentions.length > 0 && (
                        <div className="flex flex-wrap items-center gap-1.5">
                            <PhoneForwarded className="h-3.5 w-3.5 text-muted-foreground" />
                            {employee.extentions.map((ext, index) => (
                                <Badge
                                    key={index}
                                    variant="outline"
                                    className="bg-background font-mono"
                                >
                                    {ext}
                                </Badge>
                            ))}
                        </div>
                    )}
                </div>
            </CardContent>

            <CardFooter className="relative z-10 flex justify-between border-t px-6 pt-3">
                <span className="text-muted-foreground">
                    {isActive
                        ? t('Joining Date')
                        : t('Resignation Date')}
                </span>

                <span className="font-medium">
                    {isActive
                        ? employee.joining_date
                        : employee.leaving_date}
                </span>
            </CardFooter>
        </Card>
    );
}
