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
    form: any;
}

export default function EnglishName({ form }: Props) {
    return (
        <Card>
            <CardHeader>
                <CardTitle className="flex items-center gap-2">
                    <Languages className="h-5 w-5" />
                    English Name
                </CardTitle>

                <CardDescription>
                    Enter the employee's official English name.
                </CardDescription>
            </CardHeader>

            <CardContent className="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">
                <div className="space-y-2">
                    <label className="text-sm font-medium">First Name</label>

                    <Input
                        dir="ltr"
                        value={form.data.first_name_en}
                        onChange={(e) =>
                            form.setData('first_name_en', e.target.value)
                        }
                    />

                    <InputError message={form.errors.first_name_en} />
                </div>

                <div className="space-y-2">
                    <label className="text-sm font-medium">Middle Name</label>

                    <Input
                        dir="ltr"
                        value={form.data.middle_name_en}
                        onChange={(e) =>
                            form.setData('middle_name_en', e.target.value)
                        }
                    />

                    <InputError message={form.errors.middle_name_en} />
                </div>

                <div className="space-y-2">
                    <label className="text-sm font-medium">Third Name</label>

                    <Input
                        dir="ltr"
                        value={form.data.third_name_en}
                        onChange={(e) =>
                            form.setData('third_name_en', e.target.value)
                        }
                    />

                    <InputError message={form.errors.third_name_en} />
                </div>

                <div className="space-y-2">
                    <label className="text-sm font-medium">Family Name</label>

                    <Input
                        dir="ltr"
                        value={form.data.last_name_en}
                        onChange={(e) =>
                            form.setData('last_name_en', e.target.value)
                        }
                    />

                    <InputError message={form.errors.last_name_en} />
                </div>
            </CardContent>
        </Card>
    );
}
