import { Languages } from 'lucide-react';
import InputError from '@/components/input-error';
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from '@/components/ui/card';

import { Input } from '@/components/ui/input';

type NameValues = {
    first_name: string;
    middle_name?: string;
    third_name?: string;
    last_name: string;
};

type Props = {
    title: string;
    description: string;
    dir: 'rtl' | 'ltr';
    values: NameValues;
    errors: Partial<NameValues>;
    setData: (name: string, value: string) => void;
    fieldPrefix: 'ar' | 'en';
};

export default function NameFields({
    title,
    description,
    dir,
    values,
    errors,
    setData,
    fieldPrefix,
}: Props) {
    return (
        <Card>
            <CardHeader>
                <CardTitle className="flex items-center gap-2">
                    <Languages className="h-5 w-5" />
                    {title}
                </CardTitle>
                <CardDescription>{description}</CardDescription>
            </CardHeader>

            <CardContent className="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">
                <div className="space-y-2">
                    <label className="text-sm font-medium">First Name</label>
                    <Input
                        dir={dir}
                        value={values.first_name}
                        onChange={(e) =>
                            setData(`first_name_${fieldPrefix}`, e.target.value)
                        }
                    />
                    <InputError message={errors.first_name} />
                </div>

                <div className="space-y-2">
                    <label className="text-sm font-medium">Middle Name</label>
                    <Input
                        dir={dir}
                        value={values.middle_name}
                        onChange={(e) =>
                            setData(
                                `middle_name_${fieldPrefix}`,
                                e.target.value,
                            )
                        }
                    />
                    <InputError message={errors.middle_name} />
                </div>

                <div className="space-y-2">
                    <label className="text-sm font-medium">Third Name</label>
                    <Input
                        dir={dir}
                        value={values.third_name}
                        onChange={(e) =>
                            setData(`third_name_${fieldPrefix}`, e.target.value)
                        }
                    />
                    <InputError message={errors.third_name} />
                </div>

                <div className="space-y-2">
                    <label className="text-sm font-medium">Last Name</label>
                    <Input
                        dir={dir}
                        value={values.last_name}
                        onChange={(e) =>
                            setData(`last_name_${fieldPrefix}`, e.target.value)
                        }
                    />
                    <InputError message={errors.last_name} />
                </div>
            </CardContent>
        </Card>
    );
}
