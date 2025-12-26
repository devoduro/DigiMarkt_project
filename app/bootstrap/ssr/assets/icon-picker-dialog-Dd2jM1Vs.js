import { jsxs, Fragment, jsx } from "react/jsx-runtime";
import { D as Dialog, b as DialogContent, c as DialogHeader, d as DialogTitle } from "./dialog-DD5SXV81.js";
import { u as useLang } from "./use-lang-44ndmTOc.js";
import { useState } from "react";
import { I as IconPicker } from "./icon-picker-_EIJQgy3.js";
import { I as Input } from "./input-C6-Ta46A.js";
import { S as ScrollArea } from "./scroll-area-DPHRDnwL.js";
import { T as TooltipProvider } from "./tooltip-DswKljFZ.js";
const IconPickerDialog = ({ onSelect, value, name, placeholder }) => {
  const [openIcon, setOpenIcon] = useState(false);
  const { dashboard } = useLang();
  return /* @__PURE__ */ jsxs(Fragment, { children: [
    /* @__PURE__ */ jsx(Input, { required: true, readOnly: true, type: "text", name, value, placeholder: placeholder || name, onClick: () => setOpenIcon(true) }),
    /* @__PURE__ */ jsx(TooltipProvider, { delayDuration: 0, children: /* @__PURE__ */ jsx(Dialog, { open: openIcon, onOpenChange: setOpenIcon, children: /* @__PURE__ */ jsx(DialogContent, { className: "p-0", children: /* @__PURE__ */ jsxs(ScrollArea, { className: "max-h-[90vh] p-6", children: [
      /* @__PURE__ */ jsx(DialogHeader, { className: "mb-6", children: /* @__PURE__ */ jsx(DialogTitle, { children: dashboard.icon_picker }) }),
      /* @__PURE__ */ jsx(
        IconPicker,
        {
          onSelect: (icon) => {
            onSelect(icon);
            setOpenIcon(false);
          }
        }
      )
    ] }) }) }) })
  ] });
};
export {
  IconPickerDialog as I
};
