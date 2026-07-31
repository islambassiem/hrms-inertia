// resources/js/pages/employees/overview.tsx

import {
    Briefcase,
    Building2,
    Calendar,
    Clock3,
    FileText,
    ShieldCheck,
    User,
    Users,
} from 'lucide-react';
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import AppLayout from '@/layouts/app-layout';
import EmployeeLayout from '@/layouts/employees/employee-layout';

function EmployeeOverview() {
    return (
        <div className="space-y-6">
            {/* Header */}

            <Card>
                <CardContent className="flex flex-col gap-6 p-6 lg:flex-row lg:items-center lg:justify-between">
                    <div className="flex items-center gap-4">
                        <div className="flex h-20 w-20 items-center justify-center rounded-full bg-muted">
                            <User className="h-9 w-9 text-muted-foreground" />
                        </div>

                        <div className="space-y-2">
                            <div className="flex flex-wrap items-center gap-2">
                                <h1 className="text-2xl font-bold">
                                    Ahmed Mohamed
                                </h1>

                                <Badge>Active</Badge>
                            </div>

                            <p className="text-muted-foreground">
                                Senior Backend Developer
                            </p>

                            <div className="flex flex-wrap gap-x-6 gap-y-2 text-sm text-muted-foreground">
                                <span>EMP-1004</span>
                                <span>Engineering</span>
                                <span>Joined 15 Mar 2022</span>
                            </div>
                        </div>
                    </div>

                    <div className="flex flex-wrap gap-2">
                        <Button>Edit</Button>
                        <Button variant="outline">Promote</Button>
                        <Button variant="outline">Transfer</Button>
                    </div>
                </CardContent>
            </Card>

            {/* Summary Cards */}

            <div className="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                <SummaryCard
                    icon={<Briefcase className="h-5 w-5" />}
                    title="Employment"
                    value="Full Time"
                    subtitle="Permanent"
                />

                <SummaryCard
                    icon={<Building2 className="h-5 w-5" />}
                    title="Department"
                    value="Engineering"
                    subtitle="Backend Team"
                />

                <SummaryCard
                    icon={<Users className="h-5 w-5" />}
                    title="Manager"
                    value="John Doe"
                    subtitle="Engineering Manager"
                />

                <SummaryCard
                    icon={<ShieldCheck className="h-5 w-5" />}
                    title="Status"
                    value="Active"
                    subtitle="Currently Working"
                />
            </div>

            {/* Main Grid */}

            <div className="grid gap-6 xl:grid-cols-12">
                <div className="space-y-6 xl:col-span-8">
                    <InfoCard
                        title="Current Assignment"
                        icon={<Briefcase className="h-4 w-4" />}
                    >
                        <div className="grid gap-4 sm:grid-cols-2">
                            <Item label="Project" value="ERP System" />
                            <Item label="Role" value="Lead Backend Developer" />
                            <Item label="Manager" value="John Doe" />
                            <Item label="Started" value="Jan 2026" />
                        </div>
                    </InfoCard>

                    <InfoCard
                        title="Performance Snapshot"
                        icon={<Clock3 className="h-4 w-4" />}
                    >
                        <div className="grid gap-4 sm:grid-cols-3">
                            <Item
                                label="Last Review"
                                value="Exceeds Expectations"
                            />

                            <Item label="Next Review" value="Oct 2026" />

                            <Item label="Goals" value="6 Active" />
                        </div>
                    </InfoCard>

                    <InfoCard
                        title="Recent Activity"
                        icon={<Calendar className="h-4 w-4" />}
                    >
                        <div className="space-y-5">
                            <TimelineItem
                                title="Leave Approved"
                                date="Yesterday"
                            />

                            <TimelineItem
                                title="Performance Review Completed"
                                date="3 days ago"
                            />

                            <TimelineItem
                                title="Salary Updated"
                                date="1 week ago"
                            />

                            <TimelineItem
                                title="Promoted"
                                date="March 2026"
                                last
                            />
                        </div>
                    </InfoCard>
                </div>

                <div className="space-y-6 xl:col-span-4">
                    <InfoCard
                        title="Quick Stats"
                        icon={<User className="h-4 w-4" />}
                    >
                        <div className="grid grid-cols-2 gap-4">
                            <Stat value="3.4" label="Years" />
                            <Stat value="12" label="Projects" />
                            <Stat value="9" label="Trainings" />
                            <Stat value="6" label="Leaves" />
                        </div>
                    </InfoCard>

                    <InfoCard
                        title="Leave Balance"
                        icon={<Calendar className="h-4 w-4" />}
                    >
                        <div className="space-y-4">
                            <Item label="Annual" value="18 / 30" />
                            <Item label="Sick" value="10 / 15" />
                            <Item label="Emergency" value="2 / 5" />
                        </div>
                    </InfoCard>

                    <InfoCard
                        title="Documents"
                        icon={<FileText className="h-4 w-4" />}
                    >
                        <div className="space-y-4">
                            <Item label="Passport" value="Valid" />
                            <Item label="Visa" value="Valid" />
                            <Item label="Contract" value="Uploaded" />
                            <Item label="Medical" value="Expires in 20 days" />
                        </div>
                    </InfoCard>
                </div>
            </div>
        </div>
    );
}

function SummaryCard({
    icon,
    title,
    value,
    subtitle,
}: {
    icon: React.ReactNode;
    title: string;
    value: string;
    subtitle: string;
}) {
    return (
        <Card>
            <CardContent className="flex items-start gap-4 p-6">
                <div className="rounded-lg bg-muted p-3">{icon}</div>

                <div>
                    <p className="text-sm text-muted-foreground">{title}</p>

                    <h3 className="font-semibold">{value}</h3>

                    <p className="text-sm text-muted-foreground">{subtitle}</p>
                </div>
            </CardContent>
        </Card>
    );
}

function InfoCard({
    title,
    icon,
    children,
}: {
    title: string;
    icon: React.ReactNode;
    children: React.ReactNode;
}) {
    return (
        <Card>
            <CardHeader className="flex flex-row items-center gap-2">
                {icon}
                <CardTitle className="text-base">{title}</CardTitle>
            </CardHeader>

            <CardContent>{children}</CardContent>
        </Card>
    );
}

function Item({ label, value }: { label: string; value: string }) {
    return (
        <div>
            <p className="text-sm text-muted-foreground">{label}</p>

            <p className="font-medium">{value}</p>
        </div>
    );
}

function Stat({ value, label }: { value: string; label: string }) {
    return (
        <div className="rounded-lg border p-4 text-center">
            <p className="text-2xl font-bold">{value}</p>

            <p className="mt-1 text-sm text-muted-foreground">{label}</p>
        </div>
    );
}

function TimelineItem({
    title,
    date,
    last = false,
}: {
    title: string;
    date: string;
    last?: boolean;
}) {
    return (
        <div className="relative flex gap-4">
            {!last && (
                <div className="absolute inset-s-1.75 top-4 h-full w-px bg-border" />
            )}

            <div className="mt-1 h-4 w-4 rounded-full border-2 border-primary bg-background" />

            <div>
                <p className="font-medium">{title}</p>

                <p className="text-sm text-muted-foreground">{date}</p>
            </div>
        </div>
    );
}

EmployeeOverview.layout = [AppLayout, EmployeeLayout];

export default EmployeeOverview;
