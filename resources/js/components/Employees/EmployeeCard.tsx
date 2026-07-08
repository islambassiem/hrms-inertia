import { Mail, Phone, MoreVertical, PhoneForwarded } from 'lucide-react';
import { useTranslation } from 'react-i18next';
import { Avatar, AvatarImage, AvatarFallback } from '@/components/ui/avatar';

import { Button } from '@/components/ui/button';
import { Card, CardContent, CardFooter } from '@/components/ui/card';
import {
    DropdownMenu,
    DropdownMenuTrigger,
    DropdownMenuContent,
    DropdownMenuItem,
} from '@/components/ui/dropdown-menu';
import { Separator } from '@/components/ui/separator';
import { cn } from '@/lib/utils';
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
                'relative flex h-full flex-col gap-0 overflow-hidden pb-4 transition hover:shadow-lg',
                !isActive && 'bg-muted/30 opacity-80',
            )}
        >
            {/* Ribbon */}
            <Ribbon
                label={isActive ? t('Active') : t('Inactive')}
                variant={isActive ? 'active' : 'inactive'}
            />

            <CardContent className="flex flex-1 flex-col p-6">
                {/* Avatar */}
                <div className="flex justify-center">
                    <Avatar
                        className={cn(
                            'h-24 w-24 shadow-md ring-4 ring-background',
                            !isActive && 'grayscale',
                        )}
                    >
                        <AvatarImage src={`https://picsum.photos/200/300`} />
                        <AvatarFallback>
                            {employee.name_en?.slice(0, 2)}
                        </AvatarFallback>
                    </Avatar>
                </div>

                {/* Name */}
                <div className="mt-4 flex-1 text-center">
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

                <div className="absolute top-4 right-4">
                    <DropdownMenu>
                        <DropdownMenuTrigger asChild>
                            <Button variant="ghost" size="icon">
                                <MoreVertical className="h-4 w-4" />
                            </Button>
                        </DropdownMenuTrigger>

                        <DropdownMenuContent align="end">
                            <DropdownMenuItem>{t('View')}</DropdownMenuItem>
                            <DropdownMenuItem>{t('Edit')}</DropdownMenuItem>
                        </DropdownMenuContent>
                    </DropdownMenu>
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
                            <PhoneForwarded className="h-3.5 w-3.5" />
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

            <CardFooter className="flex justify-between border-t px-6 pt-2">
                <div>
                    {isActive ? t('Joining Date') : t('Resignation Date')}
                </div>
                <div>
                    {isActive ? employee.joining_date : employee.leaving_date}
                </div>
            </CardFooter>
        </Card>
    );
}
