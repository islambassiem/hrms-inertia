import {
    BadgeInfo,
    CalendarDays,
    HeartHandshake,
    MapPin,
    Accessibility,
    Flag,
    UserRound,
} from 'lucide-react';
import { useContext } from 'react';
import InputError from '@/components/input-error';
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from '@/components/ui/card';

import { Input } from '@/components/ui/input';
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from '@/components/ui/select';
import { EmployeeFormContext } from '@/contexts/EmployeeFormContext';
import type { EmployeeFormContextType } from '@/contexts/EmployeeFormContext';

interface Props {
    values: {
        gender_id: string;
        date_of_birth: string;
        nationality_id: string;
        place_of_birth: string;
        religion_id: string;
        marital_status_id: string;
        special_needs_id: string;
    };
    errors: {
        gender_id?: string;
        date_of_birth?: string;
        nationality_id?: string;
        place_of_birth?: string;
        religion_id?: string;
        marital_status_id?: string;
        special_needs_id?: string;
    };
    setData: (field: string, value: string) => void;
}

export default function PersonalInformation({
    values,
    errors,
    setData,
}: Props) {
    const reference: EmployeeFormContextType | undefined =
        useContext(EmployeeFormContext);

    return (
        <Card>
            <CardHeader>
                <CardTitle className="flex items-center gap-2">
                    <UserRound className="h-5 w-5" />
                    Personal Information
                </CardTitle>

                <CardDescription>
                    Personal details and official identity information.
                </CardDescription>
            </CardHeader>
            <CardContent className="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">
                {/* Gender */}
                <div className="space-y-2">
                    <label className="text-sm font-medium">Gender</label>
                    <Select
                        value={values.gender_id}
                        onValueChange={(value) => setData('gender_id', value)}
                    >
                        <SelectTrigger>
                            <UserRound className="me-2 h-4 w-4 text-muted-foreground" />

                            <SelectValue placeholder="Select gender" />
                        </SelectTrigger>

                        <SelectContent>
                            {reference?.genders.data.map((gender) => (
                                <SelectItem
                                    key={gender.id}
                                    value={String(gender.id)}
                                >
                                    {gender.attributes.name}
                                </SelectItem>
                            ))}
                        </SelectContent>
                    </Select>

                    <InputError message={errors.gender_id} />
                </div>

                {/* Date of Birth */}

                <div className="space-y-2">
                    <label className="text-sm font-medium">Date of Birth</label>

                    <div className="relative">
                        <CalendarDays className="absolute inset-s-3 top-1/2 h-4 w-4 -translate-y-1/2 text-muted-foreground" />

                        <Input
                            type="date"
                            className="ps-10"
                            value={values.date_of_birth}
                            onChange={(e) =>
                                setData('date_of_birth', e.target.value)
                            }
                        />
                    </div>

                    <InputError message={errors.date_of_birth} />
                </div>

                {/* Nationality */}

                <div className="space-y-2">
                    <label className="text-sm font-medium">Nationality</label>

                    <Select
                        value={values.nationality_id}
                        onValueChange={(value) =>
                            setData('nationality_id', value)
                        }
                    >
                        <SelectTrigger>
                            <Flag className="me-2 h-4 w-4 text-muted-foreground" />

                            <SelectValue placeholder="Select nationality" />
                        </SelectTrigger>

                        <SelectContent>
                            {reference?.countries.data.map((country) => (
                                <SelectItem
                                    key={country.id}
                                    value={String(country.id)}
                                >
                                    {country.attributes.name}
                                </SelectItem>
                            ))}
                        </SelectContent>
                    </Select>

                    <InputError message={errors.nationality_id} />
                </div>

                {/* Place of Birth */}

                <div className="space-y-2">
                    <label className="text-sm font-medium">
                        Place of Birth
                    </label>

                    <Select
                        value={values.place_of_birth}
                        onValueChange={(value) =>
                            setData('place_of_birth', value)
                        }
                    >
                        <SelectTrigger>
                            <MapPin className="me-2 h-4 w-4 text-muted-foreground" />

                            <SelectValue placeholder="Select country" />
                        </SelectTrigger>

                        <SelectContent>
                            {reference?.countries.data.map((country) => (
                                <SelectItem
                                    key={country.id}
                                    value={String(country.id)}
                                >
                                    {country.attributes.name}
                                </SelectItem>
                            ))}
                        </SelectContent>
                    </Select>

                    <InputError message={errors.place_of_birth} />
                </div>

                {/* Religion */}

                <div className="space-y-2">
                    <label className="text-sm font-medium">Religion</label>

                    <Select
                        value={values.religion_id}
                        onValueChange={(value) => setData('religion_id', value)}
                    >
                        <SelectTrigger>
                            <HeartHandshake className="me-2 h-4 w-4 text-muted-foreground" />

                            <SelectValue placeholder="Select religion" />
                        </SelectTrigger>

                        <SelectContent>
                            {reference?.religions.data.map((religion) => (
                                <SelectItem
                                    key={religion.id}
                                    value={String(religion.id)}
                                >
                                    {religion.attributes.name}
                                </SelectItem>
                            ))}
                        </SelectContent>
                    </Select>

                    <InputError message={errors.religion_id} />
                </div>

                {/* Marital Status */}

                <div className="space-y-2">
                    <label className="text-sm font-medium">
                        Marital Status
                    </label>

                    <Select
                        value={values.marital_status_id}
                        onValueChange={(value) =>
                            setData('marital_status_id', value)
                        }
                    >
                        <SelectTrigger>
                            <BadgeInfo className="me-2 h-4 w-4 text-muted-foreground" />

                            <SelectValue placeholder="Select status" />
                        </SelectTrigger>

                        <SelectContent>
                            {reference?.maritalStatuses.data.map((status) => (
                                <SelectItem
                                    key={status.id}
                                    value={String(status.id)}
                                >
                                    {status.attributes.name}
                                </SelectItem>
                            ))}
                        </SelectContent>
                    </Select>

                    <InputError message={errors.marital_status_id} />
                </div>

                {/* Special Needs */}

                <div className="space-y-2">
                    <label className="text-sm font-medium">Special Needs</label>

                    <Select
                        value={values.special_needs_id}
                        onValueChange={(value) =>
                            setData('special_needs_id', value)
                        }
                    >
                        <SelectTrigger>
                            <Accessibility className="me-2 h-4 w-4 text-muted-foreground" />

                            <SelectValue placeholder="Select option" />
                        </SelectTrigger>

                        <SelectContent>
                            {reference?.specialNeeds.data.map((item) => (
                                <SelectItem
                                    key={item.id}
                                    value={String(item.id)}
                                >
                                    {item.attributes.name}
                                </SelectItem>
                            ))}
                        </SelectContent>
                    </Select>

                    <InputError message={errors.special_needs_id} />
                </div>
            </CardContent>
        </Card>
    );
}
