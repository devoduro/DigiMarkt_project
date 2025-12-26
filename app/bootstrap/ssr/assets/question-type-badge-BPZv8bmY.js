import { jsxs, jsx } from "react/jsx-runtime";
import { B as Badge } from "./badge-B4crNM73.js";
import { c as cn } from "./utils-BmtPBcb0.js";
import { Headphones, FileText, ListOrdered, Type, Link2, CheckSquare, CheckCircle } from "lucide-react";
const questionTypeConfig = {
  multiple_choice: {
    label: "Multiple Choice",
    icon: CheckCircle,
    color: "bg-blue-100 text-blue-800 hover:bg-blue-100"
  },
  multiple_select: {
    label: "Multiple Select",
    icon: CheckSquare,
    color: "bg-purple-100 text-purple-800 hover:bg-purple-100"
  },
  matching: {
    label: "Matching",
    icon: Link2,
    color: "bg-green-100 text-green-800 hover:bg-green-100"
  },
  fill_blank: {
    label: "Fill Blank",
    icon: Type,
    color: "bg-yellow-100 text-yellow-800 hover:bg-yellow-100"
  },
  ordering: {
    label: "Ordering",
    icon: ListOrdered,
    color: "bg-orange-100 text-orange-800 hover:bg-orange-100"
  },
  short_answer: {
    label: "Short Answer",
    icon: FileText,
    color: "bg-red-100 text-red-800 hover:bg-red-100"
  },
  listening: {
    label: "Listening",
    icon: Headphones,
    color: "bg-indigo-100 text-indigo-800 hover:bg-indigo-100"
  }
};
const QuestionTypeBadge = ({ type, className }) => {
  const config = questionTypeConfig[type];
  const Icon = config.icon;
  return /* @__PURE__ */ jsxs(Badge, { variant: "secondary", className: cn("gap-1.5", config.color, className), children: [
    /* @__PURE__ */ jsx(Icon, { className: "h-3 w-3" }),
    /* @__PURE__ */ jsx("span", { className: "text-xs font-medium", children: config.label })
  ] });
};
export {
  QuestionTypeBadge as Q
};
