import { Edit } from 'lucide-react';
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Separator } from '@/components/ui/separator';
import AppLayout from '@/layouts/app-layout';
import EmployeeLayout from '@/layouts/employees/employee-layout';

interface Employee {
    data: {
        id: number;
        employee_code: string;
        profile: {
            full_name: string;
            prefered_name: string;
            image: string;
        };
        contacts: {
            official_email: string;
            personal_email: string;
            phone: string;
            extentions: string[];
        };
        personal: {
            gender: string;
            nationality: string;
            marital_status: string;
            religion: string;
            date_of_birth: string;
        };
        official: {
            is_active: boolean;
            joining_date: string;
            department: string;
            category: string;
            head: string;
            position: string;
        };
        identification: {
            identity_number: string;
            place_of_issue: string;
            issue_date: string;
            expiry_date: string;
        };
        passport: {
            identity_number: string;
            place_of_issue: string;
            issue_date: string;
            expiry_date: string;
        };
    };
}

function EmployeePersonalPage({ employee }: { employee: Employee }) {
    console.log(employee.data);

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
                    <DetailItem
                        label="Preferd Name"
                        value={employee.data.profile.prefered_name}
                    />
                    <DetailItem
                        label="Gender"
                        value={employee.data.personal.gender}
                    />
                    <DetailItem
                        label="Date of Birth"
                        value={employee.data.personal.date_of_birth}
                    />
                    <DetailItem
                        label="Nationality"
                        value={employee.data.personal.nationality}
                    />
                    <DetailItem
                        label="Marital Status"
                        value={employee.data.personal.marital_status}
                    />
                    <DetailItem
                        label="Religion"
                        value={employee.data.personal.religion}
                    />
                </SectionCard>

                <SectionCard title="Contact Information">
                    <DetailItem
                        label="Email"
                        value={employee.data.contacts.official_email}
                    />

                    <DetailItem
                        label="Phone"
                        value={employee.data.contacts.phone}
                    />

                    <DetailItem
                        label="Personal Email"
                        value={employee.data.contacts.personal_email}
                    />

                    <div className="space-y-1">
                        <p className="text-sm text-muted-foreground">
                            Extentions
                        </p>

                        <p className="font-medium wrap-break-word">
                            {employee.data.contacts.extentions.length > 0
                                ? employee.data.contacts.extentions.map(
                                      (ext, index) => (
                                          <Badge
                                              key={index}
                                              variant="outline"
                                              className="bg-background font-mono"
                                          >
                                              {ext}
                                          </Badge>
                                      ),
                                  )
                                : '-'}
                        </p>
                    </div>
                </SectionCard>
            </div>

            <div className="grid gap-6 xl:grid-cols-2">
                <SectionCard title="Identification">
                    <DetailItem
                        label="National ID"
                        value={employee.data.identification.identity_number}
                    />

                    <DetailItem
                        label="Place of Issue"
                        value={employee.data.identification.place_of_issue}
                    />

                    <DetailItem
                        label="Issue Date"
                        value={employee.data.identification.issue_date}
                    />

                    <DetailItem
                        label="Expiry Date"
                        value={employee.data.identification.expiry_date}
                    />
                </SectionCard>

                <SectionCard title="Passport">
                    <DetailItem
                        label="Passport Number"
                        value={employee.data.passport.identity_number}
                    />

                    <DetailItem
                        label="Place of Issue"
                        value={employee.data.passport.place_of_issue}
                    />

                    <DetailItem
                        label="Issue Date"
                        value={employee.data.passport.issue_date}
                    />

                    <DetailItem
                        label="Expiry Date"
                        value={employee.data.passport.expiry_date}
                    />
                </SectionCard>
            </div>

            <SectionCard title="Banking Information">
                <DetailItem label="Bank" value="Al Rajhi Bank" />

                <DetailItem label="Account Holder" value="Ahmed Mohamed" />

                <DetailItem label="IBAN" value="SA0380000000608010167519" />

                <DetailItem label="SWIFT" value="RJHISARI" />
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

function SectionCard({ title, children }: SectionCardProps) {
    return (
        <Card>
            <CardHeader>
                <CardTitle>{title}</CardTitle>
            </CardHeader>

            <Separator />

            <CardContent className="grid gap-6 sm:grid-cols-2">
                {children}
            </CardContent>
        </Card>
    );
}

interface DetailItemProps {
    label: string;
    value?: React.ReactNode;
}

function DetailItem({ label, value }: DetailItemProps) {
    return (
        <div className="space-y-1">
            <p className="text-sm text-muted-foreground">{label}</p>

            <p className="font-medium wrap-break-word">{value ?? '—'}</p>
        </div>
    );
}

EmployeePersonalPage.layout = [AppLayout, EmployeeLayout];
export default EmployeePersonalPage;
