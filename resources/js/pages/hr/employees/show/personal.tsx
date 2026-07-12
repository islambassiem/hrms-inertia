
import { Edit } from "lucide-react";
import { Button } from "@/components/ui/button";
import {
    Card,
    CardContent,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import { Separator } from "@/components/ui/separator";
import AppLayout from "@/layouts/app-layout";
import EmployeeLayout from "@/layouts/employees/employee-layout";

function EmployeePersonalPage() {
    return (
        <div className="space-y-6">
            <div className="flex items-center justify-between">
                <div>
                    <h2 className="text-2xl font-semibold">
                        Personal Information
                    </h2>

                    <p className="text-sm text-muted-foreground">
                        Employee identity, contact and legal information.
                    </p>
                </div>

                <Button>
                    <Edit className="mr-2 h-4 w-4" />
                    Edit
                </Button>
            </div>

            <div className="grid gap-6 xl:grid-cols-2">
                <SectionCard title="Basic Information">
                    <DetailItem label="Employee ID" value="EMP-1004" />
                    <DetailItem label="Full Name" value="Ahmed Mohamed" />
                    <DetailItem label="Preferred Name" value="Ahmed" />
                    <DetailItem label="Gender" value="Male" />
                    <DetailItem label="Date of Birth" value="15 Mar 1995" />
                    <DetailItem label="Nationality" value="Egyptian" />
                    <DetailItem label="Marital Status" value="Married" />
                    <DetailItem label="Religion" value="Muslim" />
                </SectionCard>

                <SectionCard title="Contact Information">
                    <DetailItem
                        label="Email"
                        value="ahmed@example.com"
                    />

                    <DetailItem
                        label="Phone"
                        value="+966 50 123 4567"
                    />

                    <DetailItem
                        label="Emergency Contact"
                        value="Sara Mohamed"
                    />

                    <DetailItem
                        label="Emergency Phone"
                        value="+966 55 987 6543"
                    />

                    <DetailItem
                        label="Address"
                        value="King Fahd Road"
                    />

                    <DetailItem
                        label="City"
                        value="Riyadh"
                    />

                    <DetailItem
                        label="Country"
                        value="Saudi Arabia"
                    />
                </SectionCard>
            </div>

            <div className="grid gap-6 xl:grid-cols-2">
                <SectionCard title="Identification">
                    <DetailItem
                        label="National ID"
                        value="1234567890"
                    />

                    <DetailItem
                        label="Passport Number"
                        value="A12345678"
                    />

                    <DetailItem
                        label="Passport Expiry"
                        value="12 May 2030"
                    />

                    <DetailItem
                        label="Issuing Country"
                        value="Egypt"
                    />
                </SectionCard>

                <SectionCard title="Work Authorization">
                    <DetailItem
                        label="Visa Number"
                        value="VISA-001245"
                    />

                    <DetailItem
                        label="Visa Expiry"
                        value="10 Feb 2028"
                    />

                    <DetailItem
                        label="Work Permit"
                        value="WP-445566"
                    />

                    <DetailItem
                        label="Permit Expiry"
                        value="10 Feb 2028"
                    />
                </SectionCard>
            </div>

            <SectionCard title="Banking Information">
                <DetailItem
                    label="Bank"
                    value="Al Rajhi Bank"
                />

                <DetailItem
                    label="Account Holder"
                    value="Ahmed Mohamed"
                />

                <DetailItem
                    label="IBAN"
                    value="SA0380000000608010167519"
                />

                <DetailItem
                    label="SWIFT"
                    value="RJHISARI"
                />
            </SectionCard>

            <Card>
                <CardHeader>
                    <CardTitle>Notes</CardTitle>
                </CardHeader>

                <CardContent>
                    <p className="text-sm text-muted-foreground">
                        No additional notes available.
                    </p>
                </CardContent>
            </Card>
        </div>
    );
}

interface SectionCardProps {
    title: string;
    children: React.ReactNode;
}

function SectionCard({
    title,
    children,
}: SectionCardProps) {
    return (
        <Card>
            <CardHeader>
                <CardTitle>{title}</CardTitle>
            </CardHeader>

            <Separator />

            <CardContent className="grid gap-6 pt-6 sm:grid-cols-2">
                {children}
            </CardContent>
        </Card>
    );
}

interface DetailItemProps {
    label: string;
    value?: React.ReactNode;
}

function DetailItem({
    label,
    value,
}: DetailItemProps) {
    return (
        <div className="space-y-1">
            <p className="text-sm text-muted-foreground">
                {label}
            </p>

            <p className="font-medium wrap-break-word">
                {value ?? "—"}
            </p>
        </div>
    );
}

EmployeePersonalPage.layout = [AppLayout, EmployeeLayout];
export default EmployeePersonalPage;
