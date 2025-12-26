import { jsx, jsxs } from "react/jsx-runtime";
import { C as Combobox } from "./combobox-CtfF3flG.js";
import { D as DateTimePicker } from "./datetime-picker-Bln2jqxu.js";
import { I as InputError } from "./input-error-CEW4jhey.js";
import { L as LoadingButton } from "./loading-button-C4Hk_jCd.js";
import { A as Accordion, a as AccordionItem, c as AccordionContent } from "./accordion-DVAMjldm.js";
import { C as Card } from "./card-D8SB2yrw.js";
import { C as Checkbox } from "./checkbox-CO4DegBm.js";
import { I as Input } from "./input-C6-Ta46A.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { R as RadioGroup, a as RadioGroupItem } from "./radio-group-sSS5HHUP.js";
import { S as Select, a as SelectTrigger, b as SelectValue, c as SelectContent, d as SelectItem } from "./select-BxPdBi6V.js";
import { T as Textarea } from "./textarea-DctRxpgE.js";
import { u as useAuth } from "./use-auth-8FvJer_G.js";
import { D as DashboardLayout } from "./layout-DIhWWVaG.js";
import { o as onHandleChange } from "./inertia-BtwbgBI3.js";
import { useForm } from "@inertiajs/react";
import { useMemo } from "react";
import { Editor } from "richtor";
/* empty css                 */
import "./button-jZyzwgdo.js";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "cmdk";
import "lucide-react";
import "./popover-BV7JTqNd.js";
import "@radix-ui/react-popover";
import "react-day-picker";
import "./use-lang-44ndmTOc.js";
import "date-fns";
import "@radix-ui/react-accordion";
import "@radix-ui/react-checkbox";
import "@radix-ui/react-label";
import "@radix-ui/react-radio-group";
import "@radix-ui/react-select";
import "./sidebar-6wqj6oXO.js";
import "./separator-R7EO2G8T.js";
import "@radix-ui/react-separator";
import "./sheet-CuVwNO0O.js";
import "@radix-ui/react-dialog";
import "./tooltip-DswKljFZ.js";
import "@radix-ui/react-tooltip";
import "./main-BqrosZ6t.js";
import "next-themes";
import "sonner";
import "./appearance-Df_e7R4w.js";
import "./dropdown-menu-BIfW6iuW.js";
import "@radix-ui/react-dropdown-menu";
import "./language-BbuOCfpR.js";
import "./notification-BXalLCUz.js";
import "./scroll-area-DPHRDnwL.js";
import "@radix-ui/react-scroll-area";
import "./app-logo-42nmPdEQ.js";
import "./route-DlE7FdTW.js";
import "./avatar-Cr_jqfHL.js";
import "@radix-ui/react-avatar";
const CreateExam = (props) => {
  var _a;
  const { user } = useAuth();
  const { categories, instructors, system, translate } = props;
  const { input } = translate;
  const { data, setData, post, errors, processing } = useForm({
    title: "",
    short_description: "",
    description: "",
    status: "draft",
    level: "",
    pricing_type: "paid",
    price: "",
    discount: false,
    discount_price: "",
    duration_hours: 1,
    duration_minutes: 0,
    pass_mark: 50,
    max_attempts: 3,
    total_marks: 100,
    expiry_type: "lifetime",
    expiry_duration: /* @__PURE__ */ new Date(),
    thumbnail: null,
    instructor_id: user.role === "admin" && system.sub_type === "collaborative" ? "" : user.instructor_id,
    exam_category_id: ""
  });
  const handleSubmit = (e) => {
    e.preventDefault();
    post(route("exams.store"));
  };
  const transformedCategories = useMemo(() => {
    return categories.map((category) => ({
      label: category.title,
      value: category.id.toString()
    }));
  }, [categories]);
  const transformedInstructors = useMemo(() => {
    return instructors.map((instructor) => ({
      label: instructor.user.name,
      value: instructor.id.toString()
    }));
  }, [instructors]);
  const levels = ["beginner", "intermediate", "advanced"];
  const pricingTypes = ["paid", "free"];
  const expiryTypes = ["lifetime", "limited_time"];
  return /* @__PURE__ */ jsx(Card, { className: "container p-6", children: /* @__PURE__ */ jsxs("form", { onSubmit: handleSubmit, className: "space-y-6", children: [
    /* @__PURE__ */ jsxs("div", { className: "grid grid-cols-1 gap-6 md:grid-cols-2", children: [
      /* @__PURE__ */ jsxs("div", { className: "space-y-4", children: [
        /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx(Label, { children: "Exam Title *" }),
          /* @__PURE__ */ jsx(Input, { name: "title", value: data.title, onChange: (e) => onHandleChange(e, setData), placeholder: "Enter exam title" }),
          /* @__PURE__ */ jsx(InputError, { message: errors.title })
        ] }),
        /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx(Label, { children: "Short Description" }),
          /* @__PURE__ */ jsx(
            Textarea,
            {
              rows: 5,
              name: "short_description",
              value: data.short_description,
              onChange: (e) => onHandleChange(e, setData),
              placeholder: "Brief description for exam cards"
            }
          ),
          /* @__PURE__ */ jsx(InputError, { message: errors.short_description })
        ] }),
        /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx(Label, { children: "Description" }),
          /* @__PURE__ */ jsx(
            Editor,
            {
              ssr: true,
              output: "html",
              placeholder: {
                paragraph: "Enter detailed exam description...",
                imageCaption: "Enter detailed exam description..."
              },
              contentMinHeight: 256,
              contentMaxHeight: 640,
              initialContent: data.description,
              onContentChange: (value) => setData((prev) => ({
                ...prev,
                description: value
              }))
            }
          ),
          /* @__PURE__ */ jsx(InputError, { message: errors.description })
        ] })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "space-y-4", children: [
        (user == null ? void 0 : user.role) === "admin" && (system == null ? void 0 : system.sub_type) === "collaborative" && /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx(Label, { htmlFor: "instructor_id", children: "Exam Instructor *" }),
          /* @__PURE__ */ jsx(
            Combobox,
            {
              data: transformedInstructors || [],
              placeholder: "Select instructor",
              defaultValue: ((_a = data.instructor_id) == null ? void 0 : _a.toString()) || "",
              onSelect: (selected) => setData("instructor_id", selected.value)
            }
          ),
          /* @__PURE__ */ jsx(InputError, { message: errors.instructor_id })
        ] }),
        /* @__PURE__ */ jsxs("div", { className: "grid gap-6 md:grid-cols-2", children: [
          /* @__PURE__ */ jsxs("div", { children: [
            /* @__PURE__ */ jsx(Label, { htmlFor: "exam_category_id", children: "Category *" }),
            /* @__PURE__ */ jsx(
              Combobox,
              {
                data: transformedCategories,
                placeholder: "Select category",
                onSelect: (selected) => {
                  setData("exam_category_id", selected.value);
                }
              }
            ),
            /* @__PURE__ */ jsx(InputError, { message: errors.exam_category_id })
          ] }),
          /* @__PURE__ */ jsxs("div", { children: [
            /* @__PURE__ */ jsx(Label, { htmlFor: "level", children: "Difficulty Level *" }),
            /* @__PURE__ */ jsxs(Select, { value: data.level, onValueChange: (value) => setData("level", value), children: [
              /* @__PURE__ */ jsx(SelectTrigger, { children: /* @__PURE__ */ jsx(SelectValue, { placeholder: "Select level" }) }),
              /* @__PURE__ */ jsx(SelectContent, { children: levels.map((level) => /* @__PURE__ */ jsx(SelectItem, { value: level, className: "capitalize", children: level }, level)) })
            ] }),
            /* @__PURE__ */ jsx(InputError, { message: errors.level })
          ] })
        ] }),
        /* @__PURE__ */ jsxs("div", { className: "grid gap-6 md:grid-cols-3", children: [
          /* @__PURE__ */ jsxs("div", { children: [
            /* @__PURE__ */ jsx(Label, { children: "Duration (Hours) *" }),
            /* @__PURE__ */ jsx(
              Input,
              {
                type: "number",
                name: "duration_hours",
                value: data.duration_hours.toString(),
                onChange: (e) => setData("duration_hours", parseInt(e.target.value) || 0),
                placeholder: "1",
                min: "0"
              }
            ),
            /* @__PURE__ */ jsx(InputError, { message: errors.duration_hours })
          ] }),
          /* @__PURE__ */ jsxs("div", { children: [
            /* @__PURE__ */ jsx(Label, { children: "Duration (Minutes) *" }),
            /* @__PURE__ */ jsx(
              Input,
              {
                type: "number",
                name: "duration_minutes",
                value: data.duration_minutes.toString(),
                onChange: (e) => setData("duration_minutes", parseInt(e.target.value) || 0),
                placeholder: "0",
                min: "0",
                max: "59"
              }
            ),
            /* @__PURE__ */ jsx(InputError, { message: errors.duration_minutes })
          ] }),
          /* @__PURE__ */ jsxs("div", { children: [
            /* @__PURE__ */ jsx(Label, { children: "Pass Mark *" }),
            /* @__PURE__ */ jsx(
              Input,
              {
                type: "number",
                name: "pass_mark",
                value: data.pass_mark.toString(),
                onChange: (e) => setData("pass_mark", parseInt(e.target.value) || 0),
                placeholder: "50",
                min: "0",
                max: "100"
              }
            ),
            /* @__PURE__ */ jsx(InputError, { message: errors.pass_mark })
          ] })
        ] }),
        /* @__PURE__ */ jsxs("div", { className: "grid gap-6 md:grid-cols-2", children: [
          /* @__PURE__ */ jsxs("div", { children: [
            /* @__PURE__ */ jsx(Label, { children: "Max Attempts *" }),
            /* @__PURE__ */ jsx(
              Input,
              {
                type: "number",
                name: "max_attempts",
                value: data.max_attempts.toString(),
                onChange: (e) => setData("max_attempts", parseInt(e.target.value) || 1),
                placeholder: "3",
                min: "1"
              }
            ),
            /* @__PURE__ */ jsx(InputError, { message: errors.max_attempts })
          ] }),
          /* @__PURE__ */ jsxs("div", { children: [
            /* @__PURE__ */ jsx(Label, { children: "Total Marks *" }),
            /* @__PURE__ */ jsx(
              Input,
              {
                type: "number",
                name: "total_marks",
                value: data.total_marks.toString(),
                onChange: (e) => setData("total_marks", parseInt(e.target.value) || 1),
                placeholder: "100",
                min: "1"
              }
            ),
            /* @__PURE__ */ jsx(InputError, { message: errors.total_marks })
          ] })
        ] }),
        /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx(Label, { children: "Pricing Type *" }),
          /* @__PURE__ */ jsx(
            RadioGroup,
            {
              defaultValue: data.pricing_type,
              className: "flex items-center space-x-4 pt-2 pb-1",
              onValueChange: (value) => setData("pricing_type", value),
              children: pricingTypes.map((type) => /* @__PURE__ */ jsxs("div", { className: "flex items-center space-x-2", children: [
                /* @__PURE__ */ jsx(RadioGroupItem, { className: "cursor-pointer", id: type, value: type }),
                /* @__PURE__ */ jsx(Label, { htmlFor: type, className: "cursor-pointer capitalize", children: type })
              ] }, type))
            }
          ),
          /* @__PURE__ */ jsx(InputError, { message: errors.pricing_type }),
          /* @__PURE__ */ jsx(Accordion, { collapsible: true, type: "single", value: data.pricing_type, children: /* @__PURE__ */ jsx(AccordionItem, { value: "paid", className: "border-none", children: /* @__PURE__ */ jsxs(AccordionContent, { className: "space-y-4 p-0.5", children: [
            /* @__PURE__ */ jsxs("div", { className: "pt-3", children: [
              /* @__PURE__ */ jsx(Label, { htmlFor: "price", children: "Price *" }),
              /* @__PURE__ */ jsx(
                Input,
                {
                  type: "number",
                  name: "price",
                  value: data.price.toString(),
                  onChange: (e) => setData("price", e.target.value),
                  placeholder: "Enter your exam price ($0)"
                }
              ),
              /* @__PURE__ */ jsx(InputError, { message: errors.price })
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "space-y-2", children: [
              /* @__PURE__ */ jsxs("div", { className: "flex items-center space-x-2", children: [
                /* @__PURE__ */ jsx(
                  Checkbox,
                  {
                    id: "discount",
                    name: "discount",
                    checked: data.discount,
                    onCheckedChange: (checked) => {
                      setData("discount", checked === true);
                    }
                  }
                ),
                /* @__PURE__ */ jsx(Label, { htmlFor: "discount", className: "cursor-pointer", children: "Exam Discount" })
              ] }),
              data.discount && /* @__PURE__ */ jsxs("div", { children: [
                /* @__PURE__ */ jsx(
                  Input,
                  {
                    type: "number",
                    name: "discount_price",
                    value: data.discount_price.toString(),
                    onChange: (e) => setData("discount_price", e.target.value),
                    placeholder: "Enter discount price"
                  }
                ),
                /* @__PURE__ */ jsx(InputError, { message: errors.discount_price })
              ] })
            ] })
          ] }) }) })
        ] }),
        /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx(Label, { children: input.expiry_period_type }),
          /* @__PURE__ */ jsx(
            RadioGroup,
            {
              defaultValue: data.expiry_type,
              className: "flex items-center space-x-4 pt-2 pb-1",
              onValueChange: (value) => setData("expiry_type", value),
              children: expiryTypes.map((expiry) => /* @__PURE__ */ jsxs("div", { className: "flex items-center space-x-2", children: [
                /* @__PURE__ */ jsx(RadioGroupItem, { className: "cursor-pointer", id: expiry, value: expiry }),
                /* @__PURE__ */ jsx(Label, { htmlFor: expiry, className: "capitalize", children: expiry })
              ] }, expiry))
            }
          ),
          /* @__PURE__ */ jsx(InputError, { message: errors.expiry_type }),
          /* @__PURE__ */ jsx(Accordion, { collapsible: true, type: "single", value: data.expiry_type, children: /* @__PURE__ */ jsx(AccordionItem, { value: "limited_time", className: "border-none", children: /* @__PURE__ */ jsx(AccordionContent, { className: "space-y-4 p-0.5", children: /* @__PURE__ */ jsxs("div", { className: "pt-3", children: [
            /* @__PURE__ */ jsx(Label, { htmlFor: "expiry_duration", children: input.expiry_date }),
            /* @__PURE__ */ jsx(DateTimePicker, { date: data.expiry_duration, setDate: (date) => setData("expiry_duration", date) }),
            /* @__PURE__ */ jsx(InputError, { message: errors.expiry_duration })
          ] }) }) }) })
        ] }),
        /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx(Label, { htmlFor: "thumbnail", children: "Thumbnail" }),
          /* @__PURE__ */ jsx(
            Input,
            {
              type: "file",
              name: "thumbnail",
              onChange: (e) => {
                var _a2;
                const file = (_a2 = e.target.files) == null ? void 0 : _a2[0];
                if (file) {
                  setData("thumbnail", file);
                }
              }
            }
          ),
          /* @__PURE__ */ jsx(InputError, { message: errors.thumbnail })
        ] })
      ] })
    ] }),
    /* @__PURE__ */ jsx("div", { className: "col-span-2 mt-6 text-right", children: /* @__PURE__ */ jsx(LoadingButton, { loading: processing, children: "Create Exam" }) })
  ] }) });
};
CreateExam.layout = (page) => /* @__PURE__ */ jsx(DashboardLayout, { children: page });
export {
  CreateExam as default
};
