import { SlidersHorizontal } from "lucide-react";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import {
    Select,
    SelectTrigger,
    SelectValue,
    SelectContent,
    SelectItem
} from "@/components/ui/select";

import {
    Sheet,
    // SheetClose,
    SheetContent,
    SheetDescription,
    // SheetFooter,
    SheetHeader,
    SheetTitle,
    SheetTrigger,
} from "@/components/ui/sheet";

const FilterDrawer = () => {
    return (<>
        <Sheet>

            <SheetTrigger asChild>

                <Button variant="outline">
                    <SlidersHorizontal className="mr-2 h-4 w-4" />
                    Filters
                </Button>

            </SheetTrigger>

            <SheetContent className="w-105 overflow-y-auto">

                <SheetHeader>

                    <SheetTitle>
                        Employee Filters
                    </SheetTitle>

                    <SheetDescription>
                        Search employees using different parameters.
                    </SheetDescription>

                </SheetHeader>

                <div className="mt-6 space-y-5">

                    <Input placeholder="Employee Name" />

                    <Input placeholder="Employee ID" />

                    <Select>
                        <SelectTrigger>
                            <SelectValue placeholder="Department" />
                        </SelectTrigger>

                        <SelectContent>
                            <SelectItem value="hr">HR</SelectItem>
                            <SelectItem value="it">IT</SelectItem>
                        </SelectContent>
                    </Select>

                    <Select>
                        <SelectTrigger>
                            <SelectValue placeholder="Designation" />
                        </SelectTrigger>
                    </Select>

                    <Select>
                        <SelectTrigger>
                            <SelectValue placeholder="Status" />
                        </SelectTrigger>
                    </Select>

                    <Select>
                        <SelectTrigger>
                            <SelectValue placeholder="Employment Type" />
                        </SelectTrigger>
                    </Select>

                </div>
                <div className="flex gap-2 pt-4">
                    <Button variant="outline" className="flex-1">
                        Clear
                    </Button>
                    <Button className="flex-1">
                        Apply Filters
                    </Button>
                </div>
            </SheetContent>
        </Sheet>
    </>);
};

export default FilterDrawer;
