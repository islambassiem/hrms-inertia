import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar';
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import { Separator } from '@/components/ui/separator';
import type { EmployeeHeaderProps } from '@/types/hr';

export default function EmployeeHeader({
    employee,
}: {
    employee: EmployeeHeaderProps;
}) {
    console.log(employee);

    return (
        <div className="mt-4 rounded-xl border bg-card text-card-foreground shadow-sm">
            <div className="flex flex-col gap-6 p-6 lg:flex-row lg:items-center lg:justify-between">
                {/* Left */}
                <div className="flex items-center gap-4">
                    <Avatar className="h-20 w-20">
                        <AvatarImage src={employee.data.profile.image} />
                        <AvatarFallback>
                            {employee.data.profile.full_name.substring(0, 2)}
                        </AvatarFallback>
                    </Avatar>
                    <div className="space-y-2">
                        <div>
                            <h1 className="text-2xl font-bold">
                                {employee.data.profile.full_name}
                            </h1>
                            <p className="text-muted-foreground">
                                {employee.data.job_title || 'No Job Title'}
                            </p>
                            <p className="text-sm text-muted-foreground">
                                #{employee.data.employee_code}
                            </p>
                        </div>
                        <div className="flex flex-wrap gap-2">
                            <Badge
                                variant={
                                    employee.data.is_active
                                        ? 'default'
                                        : 'destructive'
                                }
                            >
                                {employee.data.is_active
                                    ? 'Active'
                                    : 'Inactive'}
                            </Badge>
                            <Badge variant="outline">
                                {employee.data.department}
                            </Badge>
                        </div>
                    </div>
                </div>

                {/* Right */}
                <Button>Edit Employee</Button>
            </div>

            <Separator />
        </div>
    );
}
