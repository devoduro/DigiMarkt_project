import { jsxs, jsx } from "react/jsx-runtime";
import { I as InputError } from "./input-error-CEW4jhey.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { I as Input } from "./input-C6-Ta46A.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { Plus, GripVertical, Trash2 } from "lucide-react";
import { useEffect } from "react";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "@radix-ui/react-label";
const OrderingForm = ({ data, setData, errors }) => {
  var _a;
  const items = ((_a = data.options) == null ? void 0 : _a.items) || [];
  useEffect(() => {
    if (items.length === 0) {
      setData("options", { items: ["", "", ""] });
    }
  }, []);
  const addItem = () => {
    const newItems = [...items, ""];
    setData("options", { items: newItems });
  };
  const removeItem = (index) => {
    const newItems = items.filter((_, i) => i !== index);
    setData("options", { items: newItems });
  };
  const updateItem = (index, value) => {
    const newItems = [...items];
    newItems[index] = value;
    setData("options", { items: newItems });
  };
  const moveItem = (index, direction) => {
    if (direction === "up" && index === 0 || direction === "down" && index === items.length - 1) return;
    const newItems = [...items];
    const newIndex = direction === "up" ? index - 1 : index + 1;
    [newItems[index], newItems[newIndex]] = [newItems[newIndex], newItems[index]];
    setData("options", { items: newItems });
  };
  return /* @__PURE__ */ jsxs("div", { className: "space-y-4", children: [
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { children: "Instructions" }),
      /* @__PURE__ */ jsxs("div", { className: "p-3 bg-blue-50 rounded-md text-sm text-blue-900", children: [
        /* @__PURE__ */ jsx("p", { className: "font-medium mb-1", children: "How ordering questions work:" }),
        /* @__PURE__ */ jsx("p", { children: "1. List the items in the correct order below" }),
        /* @__PURE__ */ jsx("p", { children: "2. The system will shuffle them for students" }),
        /* @__PURE__ */ jsx("p", { children: "3. Students must arrange them in the correct order" })
      ] })
    ] }),
    /* @__PURE__ */ jsxs("div", { className: "space-y-3", children: [
      /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
        /* @__PURE__ */ jsx(Label, { children: "Items (in correct order) *" }),
        /* @__PURE__ */ jsxs(Button, { type: "button", variant: "outline", size: "sm", onClick: addItem, children: [
          /* @__PURE__ */ jsx(Plus, { className: "h-4 w-4" }),
          "Add Item"
        ] })
      ] }),
      items.map((item, index) => /* @__PURE__ */ jsxs("div", { className: "flex gap-2 items-center", children: [
        /* @__PURE__ */ jsxs("div", { className: "flex flex-col gap-1", children: [
          /* @__PURE__ */ jsx(
            Button,
            {
              type: "button",
              variant: "ghost",
              size: "sm",
              onClick: () => moveItem(index, "up"),
              disabled: index === 0,
              className: "h-5 w-8 p-0 text-gray-400 hover:text-gray-600",
              children: "▲"
            }
          ),
          /* @__PURE__ */ jsx(
            Button,
            {
              type: "button",
              variant: "ghost",
              size: "sm",
              onClick: () => moveItem(index, "down"),
              disabled: index === items.length - 1,
              className: "h-5 w-8 p-0 text-gray-400 hover:text-gray-600",
              children: "▼"
            }
          )
        ] }),
        /* @__PURE__ */ jsx(GripVertical, { className: "h-5 w-5 text-gray-400" }),
        /* @__PURE__ */ jsxs("span", { className: "text-sm font-medium text-gray-500 w-8", children: [
          index + 1,
          "."
        ] }),
        /* @__PURE__ */ jsx("div", { className: "flex-1", children: /* @__PURE__ */ jsx(Input, { placeholder: `Item ${index + 1}`, value: item, onChange: (e) => updateItem(index, e.target.value) }) }),
        items.length > 2 && /* @__PURE__ */ jsx(Button, { type: "button", variant: "ghost", size: "sm", onClick: () => removeItem(index), className: "text-red-600", children: /* @__PURE__ */ jsx(Trash2, { className: "h-4 w-4" }) })
      ] }, index))
    ] }),
    /* @__PURE__ */ jsx(InputError, { message: errors.options })
  ] });
};
export {
  OrderingForm as default
};
