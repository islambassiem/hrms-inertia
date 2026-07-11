
import { Badge } from "@/components/ui/badge";
import { Button } from "@/components/ui/button"
import { Checkbox } from "@/components/ui/checkbox";
import { Label } from "@/components/ui/label";
import {
    Command,
    CommandDialog,
    CommandEmpty,
    CommandGroup,
    CommandInput,
    CommandItem,
    CommandList,
    CommandSeparator,
} from "@/components/ui/command"
import { useTranslation } from "react-i18next";
import { useState } from "react";
import type { ResourceList } from "@/types/hr";


interface MultiSelectProps {
    children?: React.ReactNode;
    options: ResourceList;
    showSelectAll: boolean,
    value: number[];
    onValueChange: (value: number[]) => void;
}

export function MultiSelect({
    children,
    options,
    showSelectAll,
    value,
    onValueChange
}: MultiSelectProps) {

    const [open, setOpen] = useState(false)
    const { t } = useTranslation();


    const allSelected =
        options.data.length > 0 &&
        value.length === options.data.length;

    const selected = options.data.filter((o) => value.includes(o.id));

    const toggleAll = () => {
        if (allSelected) {
            onValueChange([]);
        } else {
            onValueChange(options.data.map((o) => o.id));
        }
    };

    const toggle = (option: number) => {
        if (value.includes(option)) {
            onValueChange(value.filter((v) => v !== option));
        } else {
            onValueChange([...value, option]);
        }
    };

    return (
        <div className="flex flex-col gap-2">
            <div className="flex items-center gap-2">
                <Button
                    onClick={() => setOpen(true)} variant="outline"
                    className="w-36 flex items-center gap-3 justify-normal"
                >
                    {children}
                </Button>
                <div className="flex gap-1">

                    {selected.length > 0 && (
                        <Badge variant="secondary">
                            {selected[0].name}
                        </Badge>

                    )}

                    {selected.length > 1 && (
                        <Badge variant="secondary">
                            +{selected.length - 1}
                        </Badge>
                    )}
                </div>
            </div>
            <CommandDialog open={open} onOpenChange={setOpen} className="[&>button]:rtl:left-4 [&>button]:rtl:right-auto">
                <Command>
                    <CommandInput placeholder={t('Search') + '...'} />
                    <CommandList>
                        <CommandEmpty>{t('No results found')}.</CommandEmpty>

                        <CommandGroup>
                            {showSelectAll && (
                                <>
                                    <CommandItem onSelect={toggleAll}
                                        className="bg-transparent! flex items-center gap-3 rounded-md"
                                    >
                                        <Checkbox checked={allSelected} />
                                        <span>{t('Select All')}</span>
                                    </CommandItem>
                                    <CommandSeparator />
                                </>
                            )}
                        </CommandGroup>

                        {options.data.map((option) => (
                            <CommandItem
                                key={option.id}
                                onSelect={() => toggle(option.id)}
                                className="flex items-center gap-3 rounded-md px-3 py-2 bg-transparent! hover:bg-accent"
                            >
                                <Checkbox
                                    checked={value.includes(option.id)}
                                    onClick={(e) => e.stopPropagation()}
                                    onCheckedChange={() => toggle(option.id)}
                                />
                                <Label
                                    htmlFor={`${option.id}`}
                                    className="flex-1 cursor-pointer"
                                >
                                    {option.name}
                                </Label>
                            </CommandItem>
                        ))}
                    </CommandList>
                </Command>
            </CommandDialog>
        </div>
    )
}
