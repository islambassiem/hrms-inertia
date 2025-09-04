import { t } from "i18next";
import { memo } from "react";

interface Item {
    id: string | number;
    name: string;
}


interface MultiSelectProps {
    items: Item[];
    selected: string[];
    onChange: (selected: string[]) => void;
    name: string;
}

const MultiSelect =  ({ items, selected, onChange, name = "items" }: MultiSelectProps) => {
    const handleSelectAll = (checked: boolean) => {
        onChange(checked ? items.map((item) => String(item.id)) : []);
    };

    const handleToggle = (id: string) => {
        if (selected.includes(id)) {
            onChange(selected.filter((s) => s !== id));
        } else {
            onChange([...selected, id]);
        }
    };

    return (
        <>
            <div>
                <div className="flex gap-2">
                    <input
                        type="checkbox"
                        id={`${name}-select-all`}
                        checked={selected.length === items.length && items.length > 0}
                        onChange={(e) => handleSelectAll(e.target.checked)}
                    />
                    <label htmlFor={`${name}-select-all`}>{t('Select All')}</label>
                </div>

                {items.map((item) => {
                    const idStr = String(item.id);
                    const inputId = `${name}-${idStr}`;
                    return (
                        <div key={idStr} className="flex gap-2">
                            <input
                                id={inputId}
                                type="checkbox"
                                name={`${name}[]`}
                                value={idStr}
                                checked={selected.includes(idStr)}
                                onChange={() => handleToggle(idStr)}
                                className="border-border"
                            />
                            <label htmlFor={inputId}>{item.name}</label>
                        </div>
                    );
                })}
            </div>
        </>
    );
};

export default memo(MultiSelect)
