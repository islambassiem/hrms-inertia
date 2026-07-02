import { Mail, Phone, MoreVertical } from "lucide-react";
import { useTranslation } from "react-i18next";
import { Avatar, AvatarImage, AvatarFallback } from "@/components/ui/avatar";

import { Button } from "@/components/ui/button";
import {
    Card,
    CardContent,
    CardFooter,
} from "@/components/ui/card";
import {
    DropdownMenu,
    DropdownMenuTrigger,
    DropdownMenuContent,
    DropdownMenuItem,
} from "@/components/ui/dropdown-menu";
import { Separator } from "@/components/ui/separator";
import { useClipboard } from "@/hooks/use-clipboard";
import { cn } from "@/lib/utils";
import EmployeeName from "./EmployeeName";
import Ribbon from "./Ribbon";

export default function EmployeeCard({ employee }: any) {
    const { t } = useTranslation();
    const [copiedText, copy] = useClipboard();
    const isActive = employee.is_active;

    return (
        <Card className={cn(
            "relative overflow-hidden transition hover:shadow-lg",
            !isActive && "bg-muted/30 opacity-80"
        )}>

            {/* Ribbon */}
            <Ribbon
                label={isActive ? "ACTIVE" : "INACTIVE"}
                variant={isActive ? "active" : "inactive"}
            />

            <CardContent className="p-6">

                {/* Avatar */}
                <div className="flex justify-center">
                    <Avatar
                        className={cn(
                            "h-24 w-24 ring-4 ring-background shadow-md",
                            !isActive && "grayscale"
                        )}
                    >
                        <AvatarImage src={`https://picsum.photos/200/300`} />
                        <AvatarFallback>
                            {employee.name?.slice(0, 2)}
                        </AvatarFallback>
                    </Avatar>
                </div>

                {/* Name */}
                <div className="mt-4 text-center">
                    <EmployeeName name_en={employee.full_name_en} name_ar={employee.full_name_ar} />

                    <p className="text-xs text-muted-foreground mt-1"
                        onClick={() => copy(employee.employee_code)}
                    >
                        {employee.employee_code}
                    </p>
                    {/* <p className="mt-3 font-medium">
                        {employee.designation}
                    </p>

                    <p className="text-sm text-muted-foreground">
                        {employee.department}
                    </p> */}
                </div>

                <div className="absolute right-4 top-4">
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
                        <span className="truncate" onClick={() => copy(employee.email)}>{employee.email}</span>
                    </div>

                    <div className="flex items-center gap-2">
                        <Phone className="h-4 w-4 text-muted-foreground" />
                        <span onClick={() => copy(employee.phone)}>{employee.phone}</span>
                    </div>
                </div>
            </CardContent>

            <CardFooter className="flex justify-between border-t px-6">
                <div>
                    {isActive ? (
                        t('Joining Date')
                    ) : (
                        t('Leavgin Date')
                    )}
                </div>
                <div>
                    {isActive ? (
                        employee.joining_date
                    ) : (
                        employee.leaving_date
                    )}
                </div>
            </CardFooter>
        </Card>
    );
}
