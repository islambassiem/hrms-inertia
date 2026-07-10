import { Image, Upload, X } from 'lucide-react';
import { useRef, useMemo, useEffect } from 'react';
import InputError from '@/components/input-error';
import { Button } from '@/components/ui/button';
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from '@/components/ui/card';

interface Props {
    values: {
        image: File | null;
    };
    errors: {
        image?: string;
    };
    setData: (field: string, value: File | null) => void;
}

export default function Photo({ values, errors, setData }: Props) {
    const inputRef = useRef<HTMLInputElement>(null);

    const preview = useMemo(() => {
        if (!values.image) {
            return null;
        }

        return URL.createObjectURL(values.image);
    }, [values.image]);

    const selectImage = (event: React.ChangeEvent<HTMLInputElement>) => {
        const file = event.target.files?.[0];

        if (!file) {
            return;
        }

        setData('image', file);
    };

    useEffect(() => {
        return () => {
            if (preview) {
                URL.revokeObjectURL(preview);
            }
        };
    }, [preview]);

    const removeImage = () => {
        setData('image', null);

        if (inputRef.current) {
            inputRef.current.value = '';
        }
    };

    return (
        <Card>
            <CardHeader>
                <CardTitle className="flex items-center gap-2">
                    <Image className="h-5 w-5" />
                    Employee Photo
                </CardTitle>

                <CardDescription>
                    Upload employee profile picture.
                </CardDescription>
            </CardHeader>

            <CardContent>
                <input
                    ref={inputRef}
                    type="file"
                    accept="image/*"
                    className="hidden"
                    onChange={selectImage}
                />

                {!preview && (
                    <button
                        type="button"
                        onClick={() => inputRef.current?.click()}
                        className="flex min-h-56 w-full flex-col items-center justify-center rounded-lg border border-dashed border-border bg-muted/30 transition hover:bg-muted"
                    >
                        <Upload className="mb-3 h-10 w-10 text-muted-foreground" />

                        <span className="font-medium">Upload Image</span>

                        <span className="mt-1 text-sm text-muted-foreground">
                            PNG, JPG up to 5MB
                        </span>
                    </button>
                )}

                {preview && (
                    <div className="flex flex-col items-center gap-4">
                        <div className="relative h-48 w-48 overflow-hidden rounded-full border border-border">
                            <img
                                src={preview}
                                alt="Employee preview"
                                className="h-full w-full object-cover"
                            />
                        </div>

                        <div className="flex gap-2">
                            <Button
                                type="button"
                                variant="outline"
                                onClick={() => inputRef.current?.click()}
                            >
                                Replace
                            </Button>

                            <Button
                                type="button"
                                variant="destructive"
                                onClick={removeImage}
                            >
                                <X className="me-2 h-4 w-4" />
                                Remove
                            </Button>
                        </div>
                    </div>
                )}

                <InputError message={errors.image} />
            </CardContent>
        </Card>
    );
}
