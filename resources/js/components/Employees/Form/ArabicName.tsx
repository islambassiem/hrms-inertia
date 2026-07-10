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

interface Props {
    values: {
        first_name_ar: string;
        middle_name_ar?: string;
        third_name_ar?: string;
        last_name_ar: string;
    };
    setData: (name: string, value: string) => void;
    errors: {
        first_name_ar?: string;
        middle_name_ar?: string;
        third_name_ar?: string;
        last_name_ar?: string;
    };
}

export default function ArabicName({ values, setData, errors }: Props) {
    return (
        <Card>
            <CardHeader>
                <CardTitle className="flex items-center gap-2">
                    <Languages className="h-5 w-5" />
                    Arabic Name
                </CardTitle>
                <CardDescription>
                    Enter the employee's official Arabic name.
                </CardDescription>
            </CardHeader>
            <CardContent className="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">
                <div className="space-y-2">
                    <label className="text-sm font-medium">First Name</label>
                    <Input
                        dir="rtl"
                        value={values.first_name_ar}
                        onChange={(e) =>
                            setData('first_name_ar', e.target.value)
                        }
                    />
                    <InputError message={errors.first_name_ar} />
                </div>

                <div className="space-y-2">
                    <label className="text-sm font-medium">Middle Name</label>
                    <Input
                        dir="rtl"
                        value={values.middle_name_ar}
                        onChange={(e) =>
                            setData('middle_name_ar', e.target.value)
                        }
                    />
                    <InputError message={errors.middle_name_ar} />
                </div>

                <div className="space-y-2">
                    <label className="text-sm font-medium">Third Name</label>
                    <Input
                        dir="rtl"
                        value={values.third_name_ar}
                        onChange={(e) =>
                            setData('third_name_ar', e.target.value)
                        }
                    />
                    <InputError message={errors.third_name_ar} />
                </div>

                <div className="space-y-2">
                    <label className="text-sm font-medium">Family Name</label>
                    <Input
                        dir="rtl"
                        value={values.last_name_ar}
                        onChange={(e) =>
                            setData('last_name_ar', e.target.value)
                        }
                    />
                    <InputError message={errors.last_name_ar} />
                </div>
            </CardContent>
        </Card>
    );
}
