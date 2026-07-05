import { Mail, Phone, MoreVertical, PhoneForwarded } from "lucide-react";
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
import { cn } from "@/lib/utils";
import type { EmployeeList } from "@/types/hr";
import { Badge } from "../ui/badge";
import EmployeeName from "./EmployeeName";
import Ribbon from "./Ribbon";


export default function EmployeeCard({ employee }: { employee: EmployeeList }) {
    const { t } = useTranslation();
    const isActive = employee.is_active;

    return (
        <Card className={cn(
            "flex h-full flex-col relative overflow-hidden transition hover:shadow-lg gap-0 pb-4",
            !isActive && "bg-muted/30 opacity-80"
        )}>

            {/* Ribbon */}
            <Ribbon
                label={isActive ? t("Active") : t("Inactive")}
                variant={isActive ? "active" : "inactive"}
            />

            <CardContent className="flex-1 p-6 flex flex-col">
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
                            {employee.name_en?.slice(0, 2)}
                        </AvatarFallback>
                    </Avatar>
                </div>

                {/* Name */}
                <div className="mt-4 text-center flex-1">
                    <EmployeeName name_en={employee.name_en} name_ar={employee.name_ar} />

                    <p className="text-xs text-muted-foreground mt-1">
                        {employee.employee_code}
                    </p>

                    <p className="text-xs text-muted-foreground mt-1">
                        {employee.national_id}
                    </p>
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
                        <span className="truncate">{employee.email}</span>
                    </div>

                    <div className="flex items-center gap-2">
                        <Phone className="h-4 w-4 text-muted-foreground" />
                        <span>{employee.phone}</span>
                    </div>

                    {employee.extentions.length > 0 && (
                        <div className="flex items-center flex-wrap gap-1.5">
                            <PhoneForwarded className="w-3.5 h-3.5" />
                            {employee.extentions.map((ext, index) => (
                                <Badge key={index} variant="outline" className="font-mono bg-background">
                                    {ext}
                                </Badge>
                            ))}
                        </div>
                    )}
                </div>
            </CardContent>

            <CardFooter className="flex justify-between border-t px-6 pt-2 ">
                <div>
                    {isActive ? (
                        t('Joining Date')
                    ) : (
                        t('Resignation Date')
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
