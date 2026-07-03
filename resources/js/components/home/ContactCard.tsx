import { usePage } from "@inertiajs/react";
import { Mail, PhoneForwarded } from "lucide-react";
import { Avatar, AvatarImage, AvatarFallback } from "@/components/ui/avatar";
import { Separator } from "@/components/ui/separator";
import { cn } from "@/lib/utils";
import type { Employee } from "@/types/types";
import EmployeeName from "../Employees/EmployeeName";
import { Badge } from "../ui/badge";
import { Card, CardContent } from "../ui/card";


function ContactCard({ employee }: { employee: Employee }) {
    const { auth } = usePage().props;

    console.log(auth);

    return (
        <Card className={cn(
            "flex h-full flex-col relative overflow-hidden transition hover:shadow-lg gap-0 py-1",
        )}>

            <CardContent className="flex-1 p-6 flex flex-col">
                {/* Avatar */}
                <div className="flex justify-center">
                    <Avatar
                        className={cn(
                            "h-24 w-24 ring-4 ring-background shadow-md",
                        )}
                    >
                        <AvatarImage src={`https://picsum.photos/200/300`} />
                        <AvatarFallback>

                        </AvatarFallback>
                    </Avatar>
                </div>

                {/* Name */}
                <div className="mt-4 text-center">
                    <EmployeeName name_en={employee.name_en} name_ar={employee.name_ar} />

                    <p className="text-xs text-muted-foreground mt-1">
                        {employee.employee_code}
                    </p>

                </div>

                <Separator className="my-5" />

                {/* Contact */}
                <div className="space-y-2 text-sm">
                    <div className="flex items-center gap-2">
                        <Mail className="h-4 w-4 text-muted-foreground" />
                        <span className="truncate">{employee.email}</span>
                    </div>


                    {/* <div className="flex items-center gap-2">
                        <Phone className="h-4 w-4 text-muted-foreground" />
                        <span>{employee.phone}</span>
                    </div> */}

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
        </Card>
    );
}

export default ContactCard;
