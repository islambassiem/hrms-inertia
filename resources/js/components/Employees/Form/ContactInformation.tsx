import { Droplet, Mail, Phone, PhoneCall, ShieldCheck } from 'lucide-react';
import InputError from '@/components/input-error';
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from '@/components/ui/card';

import { Input } from '@/components/ui/input';

interface Props {
    values: {
        email: string;
        phone: string;
        blood_type: string;
        home_telephone_number: string;
        home_country_identity: string;
    };
    errors: {
        email?: string;
        phone?: string;
        blood_type?: string;
        home_telephone_number?: string;
        home_country_identity?: string;
    };
    setData: (field: string, value: string | number) => void;
}

export default function ContactInformation({ values, errors, setData }: Props) {
    return (
        <Card>
            <CardHeader>
                <CardTitle className="flex items-center gap-2">
                    <Phone className="h-5 w-5" />
                    Contact Information
                </CardTitle>
                <CardDescription>
                    Employee communication and identification details.
                </CardDescription>
            </CardHeader>
            <CardContent className="grid grid-cols-1 gap-6 lg:grid-cols-6">
                {/* Email */}

                <div className="space-y-2 lg:col-span-3">
                    <label className="text-sm font-medium">Email Address</label>

                    <div className="relative">
                        <Mail className="absolute inset-s-3 top-1/2 h-4 w-4 -translate-y-1/2 text-muted-foreground" />
                        <Input
                            type="email"
                            className="ps-10"
                            value={values.email}
                            onChange={(e) => setData('email', e.target.value)}
                        />
                    </div>

                    <InputError message={errors.email} />
                </div>

                {/* Mobile Phone */}

                <div className="space-y-2 lg:col-span-2">
                    <label className="text-sm font-medium">Mobile Phone</label>

                    <div className="relative">
                        <Phone className="absolute start-3 top-1/2 h-4 w-4 -translate-y-1/2 text-muted-foreground" />

                        <Input
                            className="ps-10"
                            value={values.phone}
                            onChange={(e) => setData('phone', e.target.value)}
                        />
                    </div>

                    <InputError message={errors.phone} />
                </div>

                {/* Blood Type */}

                <div className="space-y-2 lg:col-span-1">
                    <label className="text-sm font-medium">Blood Type</label>

                    <div className="relative">
                        <Droplet className="absolute start-3 top-1/2 h-4 w-4 -translate-y-1/2 text-muted-foreground" />

                        <Input
                            className="ps-10"
                            placeholder="A+"
                            value={values.blood_type}
                            onChange={(e) =>
                                setData('blood_type', e.target.value)
                            }
                        />
                    </div>

                    <InputError message={errors.blood_type} />
                </div>

                {/* Home Telephone */}

                <div className="space-y-2 lg:col-span-2">
                    <label className="text-sm font-medium">
                        Home Telephone
                    </label>

                    <div className="relative">
                        <PhoneCall className="absolute start-3 top-1/2 h-4 w-4 -translate-y-1/2 text-muted-foreground" />

                        <Input
                            className="ps-10"
                            value={values.home_telephone_number}
                            onChange={(e) =>
                                setData('home_telephone_number', e.target.value)
                            }
                        />
                    </div>

                    <InputError message={errors.home_telephone_number} />
                </div>

                {/* Identity */}

                <div className="space-y-2 lg:col-span-3">
                    <label className="text-sm font-medium">
                        National Identity / Country Identity
                    </label>

                    <div className="relative">
                        <ShieldCheck className="absolute start-3 top-1/2 h-4 w-4 -translate-y-1/2 text-muted-foreground" />

                        <Input
                            className="ps-10"
                            value={values.home_country_identity}
                            onChange={(e) =>
                                setData('home_country_identity', e.target.value)
                            }
                        />
                    </div>

                    <InputError message={errors.home_country_identity} />
                </div>
            </CardContent>
        </Card>
    );
}
