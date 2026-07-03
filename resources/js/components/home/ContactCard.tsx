import { Avatar, AvatarFallback, AvatarImage } from "@radix-ui/react-avatar";
import { Separator } from "@radix-ui/react-separator";
import { Hash, Mail, Phone, PhoneForwarded } from "lucide-react";
import { useTranslation } from "react-i18next";
import { Badge } from "../ui/badge";
import { Card, CardContent, CardHeader } from "../ui/card";

interface Employee {
    id: number,
    employee_code: string,
    name: string,
    image: string,
    phone: string,
    email: string,
    extentions: string[],
}


function ContactCard({ employee }: { employee: Employee }) {
    const { t } = useTranslation();
    const initials = employee.name
        ? employee.name
            .trim()
            .split(/\s+/)
            .map(n => n[0] || '')
            .join('')
            .toUpperCase()
            .slice(0, 2)
        : '??';

    if (!employee) {
        return null
    }

    return (
        <Card className="w-full overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300 gap-2">
            <CardHeader className="bg-muted/50 pb-4 whitespace-nowrap overflow-auto">
                <div className="flex items-start gap-4 justify-between">
                    <div className="flex items-center gap-3">
                        <Avatar className="h-12 w-12 border">
                            <AvatarImage src={`https://picsum.photos/id/${employee.id}/200/300`} alt={employee.name} />
                            <AvatarFallback className="font-semibold bg-primary/10 text-primary">
                                {initials}
                            </AvatarFallback>
                        </Avatar>
                        <div>
                            <h3 className="text-lg font-bold tracking-tight text-foreground leading-tight">
                                {employee.name}
                            </h3>
                            <div className="flex items-center gap-1 mt-1 text-xs text-muted-foreground font-mono">
                                <Hash className="w-3 h-3" />
                                <span>{employee.employee_code}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </CardHeader>
            <CardContent className="grid gap-4 pt-4 text-sm">
                <div className="flex items-center gap-2.5 text-muted-foreground">
                    <Mail className="w-4 h-4 text-primary shrink-0" />
                    <a href={`mailto:${employee.email}`} className="hover:underline text-foreground truncate">
                        {employee.email}
                    </a>
                </div>

                <div className="flex items-center gap-2.5 text-muted-foreground">
                    <Phone className="w-4 h-4 text-primary shrink-0" />
                    <a href={`tel:${employee.phone}`} className="hover:underline text-foreground">
                        {employee.phone}
                    </a>
                </div>

                {employee.extentions.length > 0 && (
                    <>
                        <Separator className="my-1" />
                        <div className="space-y-2">
                            <div className="flex items-center gap-1.5 text-xs font-semibold text-muted-foreground uppercase tracking-wider">
                                <PhoneForwarded className="w-3.5 h-3.5" />
                                <span>{t('Extension')}</span>
                            </div>
                            <div className="flex flex-wrap gap-1.5">
                                {employee.extentions.map((ext, index) => (
                                    <Badge key={index} variant="outline" className="font-mono bg-background">
                                        {ext}
                                    </Badge>
                                ))}
                            </div>
                        </div>
                    </>
                )}
            </CardContent>
        </Card>
    );
}

export default ContactCard;
