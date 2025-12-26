import { jsxs, jsx } from "react/jsx-runtime";
import { B as Badge } from "./badge-B4crNM73.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { D as DropdownMenu, a as DropdownMenuTrigger, b as DropdownMenuContent, c as DropdownMenuItem } from "./dropdown-menu-BIfW6iuW.js";
import { g as getQueryParams } from "./route-DlE7FdTW.js";
import { c as cn } from "./utils-BmtPBcb0.js";
import { usePage, router, Link } from "@inertiajs/react";
import { ChevronsUpDown } from "lucide-react";
import { useState } from "react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "@radix-ui/react-dropdown-menu";
import "clsx";
import "tailwind-merge";
const ExamAttemptTableColumn = () => {
  const page = usePage();
  const urlParams = getQueryParams(page.url);
  const statuses = ["all", "in_progress", "completed", "abandoned", "submitted"];
  const [reviewAttemptId, setReviewAttemptId] = useState(null);
  return [
    // {
    //    accessorKey: 'attempt_number',
    //    header: ({ column }) => {
    //       return (
    //          <div className="flex items-center pl-4">
    //             <Button variant="ghost" className="p-0 hover:bg-transparent" onClick={() => column.toggleSorting(column.getIsSorted() === 'asc')}>
    //                Attempt #
    //                <ArrowUpDown />
    //             </Button>
    //          </div>
    //       );
    //    },
    //    cell: ({ row }) => (
    //       <div className="pl-4">
    //          <p className="text-base font-medium">Attempt #{row.getValue('attempt_number')}</p>
    //       </div>
    //    ),
    // },
    {
      accessorKey: "user",
      header: ({ column }) => {
        return /* @__PURE__ */ jsx("div", { className: "flex items-center pl-4", children: /* @__PURE__ */ jsx("span", { children: "Student" }) });
      },
      cell: ({ row }) => /* @__PURE__ */ jsxs("div", { className: "py-1 pl-4", children: [
        /* @__PURE__ */ jsx("p", { className: "font-medium", children: row.original.user.name }),
        /* @__PURE__ */ jsx("p", { className: "text-muted-foreground text-xs", children: row.original.user.email })
      ] })
    },
    {
      accessorKey: "start_time",
      header: "Started At",
      cell: ({ row }) => /* @__PURE__ */ jsxs("div", { className: "py-1", children: [
        /* @__PURE__ */ jsx("p", { className: "text-sm", children: new Date(row.getValue("start_time")).toLocaleDateString() }),
        /* @__PURE__ */ jsx("p", { className: "text-muted-foreground text-xs", children: new Date(row.getValue("start_time")).toLocaleTimeString() })
      ] })
    },
    {
      accessorKey: "end_time",
      header: "Completed At",
      cell: ({ row }) => {
        const endTime = row.getValue("end_time");
        return endTime ? /* @__PURE__ */ jsxs("div", { className: "py-1", children: [
          /* @__PURE__ */ jsx("p", { className: "text-sm", children: new Date(endTime).toLocaleDateString() }),
          /* @__PURE__ */ jsx("p", { className: "text-muted-foreground text-xs", children: new Date(endTime).toLocaleTimeString() })
        ] }) : /* @__PURE__ */ jsx("div", { className: "py-1 text-center", children: "--" });
      }
    },
    // {
    //    accessorKey: 'duration_minutes',
    //    header: () => <div className="text-center">Duration</div>,
    //    cell: ({ row }) => {
    //       const duration = row.getValue('duration_minutes') as number | undefined;
    //       return (
    //          <div className="py-1 text-center">
    //             {duration ? (
    //                <span className="text-sm">
    //                   {Math.floor(duration / 60)}h {duration % 60}m
    //                </span>
    //             ) : (
    //                '--'
    //             )}
    //          </div>
    //       );
    //    },
    // },
    {
      accessorKey: "status",
      header: ({ column }) => /* @__PURE__ */ jsx("div", { className: "flex justify-center", children: /* @__PURE__ */ jsxs(DropdownMenu, { children: [
        /* @__PURE__ */ jsx(DropdownMenuTrigger, { className: "flex items-center justify-center", children: /* @__PURE__ */ jsxs(Button, { variant: "ghost", className: "text-muted-foreground capitalize", children: [
          /* @__PURE__ */ jsx("span", { children: urlParams["status"] ?? "Status" }),
          /* @__PURE__ */ jsx(ChevronsUpDown, { className: "h-3 w-3 text-gray-700" })
        ] }) }),
        /* @__PURE__ */ jsx(DropdownMenuContent, { align: "center", className: "min-w-[120px]", children: statuses.map((status) => /* @__PURE__ */ jsx(
          DropdownMenuItem,
          {
            onClick: () => router.get(
              route("exams.edit", {
                ...urlParams,
                status
              })
            ),
            className: cn("cursor-pointer text-center capitalize", urlParams["status"] === status && "bg-gray-100"),
            children: status.replace("_", " ")
          },
          status
        )) })
      ] }) }),
      cell: ({ row }) => {
        const status = row.getValue("status");
        const variant = status === "completed" ? "default" : status === "in_progress" ? "secondary" : "destructive";
        return /* @__PURE__ */ jsx("div", { className: "flex justify-center py-1", children: /* @__PURE__ */ jsx(Badge, { variant, className: "capitalize", children: status.replace("_", " ") }) });
      }
    },
    {
      accessorKey: "obtained_marks",
      header: () => /* @__PURE__ */ jsx("div", { className: "text-center", children: "Score" }),
      cell: ({ row }) => /* @__PURE__ */ jsxs("div", { className: "py-1 text-center", children: [
        /* @__PURE__ */ jsxs("p", { className: "font-semibold", children: [
          row.getValue("obtained_marks"),
          "/",
          row.original.total_marks
        ] }),
        /* @__PURE__ */ jsxs("p", { className: "text-muted-foreground text-xs", children: [
          row.original.percentage,
          "%"
        ] })
      ] })
    },
    {
      accessorKey: "correct_answers",
      header: () => /* @__PURE__ */ jsx("div", { className: "text-center", children: "Answers" }),
      cell: ({ row }) => /* @__PURE__ */ jsx("div", { className: "py-1 text-center", children: /* @__PURE__ */ jsxs("p", { className: "text-sm", children: [
        /* @__PURE__ */ jsx("span", { className: "text-green-600", children: row.getValue("correct_answers") }),
        " /",
        " ",
        /* @__PURE__ */ jsx("span", { className: "text-red-600", children: row.original.incorrect_answers })
      ] }) })
    },
    // {
    //    accessorKey: 'is_passed',
    //    header: () => <div className="text-center">Result</div>,
    //    cell: ({ row }) => {
    //       const isPassed = row.getValue('is_passed') as boolean;
    //       return (
    //          <div className="flex justify-center py-1">
    //             {row.original.status === 'completed' ? (
    //                <Badge variant={isPassed ? 'default' : 'destructive'} className="bg-opacity-10">
    //                   {isPassed ? 'Passed' : 'Failed'}
    //                </Badge>
    //             ) : (
    //                <span className="text-muted-foreground text-sm">--</span>
    //             )}
    //          </div>
    //       );
    //    },
    // },
    {
      id: "actions",
      header: () => /* @__PURE__ */ jsx("div", { className: "pr-4 text-end", children: "Actions" }),
      cell: ({ row }) => {
        const attempt = row.original;
        attempt.status === "submitted";
        attempt.status === "completed";
        return /* @__PURE__ */ jsx("div", { className: "flex justify-end gap-2 py-1 pr-4", children: /* @__PURE__ */ jsx(Button, { asChild: true, variant: "default", className: "h-8", title: "Review & Grade Attempt", children: /* @__PURE__ */ jsx(Link, { href: route("exams.edit", { exam: attempt.exam_id, ...urlParams, review: attempt.id }), children: "Review" }) }) });
      }
    }
  ];
};
export {
  ExamAttemptTableColumn as default
};
