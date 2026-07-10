import { router } from '@inertiajs/react';
import { ArrowLeft, LoaderCircle, Save } from 'lucide-react';

import { Button } from '@/components/ui/button';

interface Props {
    processing: boolean;
}

export default function FormActions({ processing }: Props) {
    return (
        <div className="sticky bottom-0 z-10 -mx-4 border-t border-border bg-background/95 px-4 py-4 backdrop-blur sm:-mx-6 sm:px-6">
            <div className="flex items-center justify-end gap-3">
                <Button
                    type="button"
                    variant="outline"
                    disabled={processing}
                    onClick={() => router.visit('/employees/index')}
                >
                    <ArrowLeft className="me-2 h-4 w-4" />
                    Cancel
                </Button>

                <Button type="submit" disabled={processing}>
                    {processing ? (
                        <LoaderCircle className="me-2 h-4 w-4 animate-spin" />
                    ) : (
                        <Save className="me-2 h-4 w-4" />
                    )}

                    {processing ? 'Saving...' : 'Save Employee'}
                </Button>
            </div>
        </div>
    );
}
