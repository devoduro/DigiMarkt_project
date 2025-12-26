import { jsx, jsxs, Fragment } from "react/jsx-runtime";
import { A as Alert, b as AlertDescription } from "./alert-BK2pCJOe.js";
import { B as Badge } from "./badge-B4crNM73.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { D as Dialog, b as DialogContent, c as DialogHeader, d as DialogTitle, g as DialogDescription, e as DialogFooter } from "./dialog-DD5SXV81.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { T as Textarea } from "./textarea-DctRxpgE.js";
import { router } from "@inertiajs/react";
import { format } from "date-fns";
import { FileText, CheckCircle2, XCircle, Info, Download } from "lucide-react";
import { useState } from "react";
import { Renderer } from "richtor";
/* empty css                 */
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "@radix-ui/react-slot";
import "@radix-ui/react-dialog";
import "@radix-ui/react-label";
const VerifyPaymentModal = ({ payment, isOpen, onClose }) => {
  const paymentMeta = payment.meta ?? {};
  const status = paymentMeta.status || "pending";
  const paymentInfo = paymentMeta.payment_info;
  const [adminNotes, setAdminNotes] = useState("");
  const handleVerify = (e) => {
    router.post(
      route("payment-reports.offline.verify", payment.id),
      {
        admin_notes: adminNotes
      },
      {
        onSuccess: () => {
          onClose();
        }
      }
    );
  };
  const handleReject = (e) => {
    router.post(
      route("payment-reports.offline.reject", payment.id),
      {
        admin_notes: adminNotes
      },
      {
        onSuccess: () => {
          onClose();
        }
      }
    );
  };
  return /* @__PURE__ */ jsx(Dialog, { open: isOpen, onOpenChange: onClose, children: /* @__PURE__ */ jsxs(DialogContent, { className: "max-h-[90vh] max-w-3xl overflow-y-auto", children: [
    /* @__PURE__ */ jsxs(DialogHeader, { children: [
      /* @__PURE__ */ jsxs(DialogTitle, { className: "flex items-center gap-2", children: [
        /* @__PURE__ */ jsx(FileText, { className: "h-5 w-5" }),
        "Offline Payment Details"
      ] }),
      /* @__PURE__ */ jsx(DialogDescription, { children: "Review and verify the offline payment submission" })
    ] }),
    /* @__PURE__ */ jsxs("div", { className: "space-y-6", children: [
      /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
        /* @__PURE__ */ jsx("span", { className: "text-sm font-medium", children: "Payment Status:" }),
        /* @__PURE__ */ jsxs(Badge, { variant: status === "verified" ? "default" : status === "rejected" ? "destructive" : "secondary", className: "gap-1", children: [
          status === "verified" ? /* @__PURE__ */ jsx(CheckCircle2, { className: "h-3 w-3" }) : status === "rejected" ? /* @__PURE__ */ jsx(XCircle, { className: "h-3 w-3" }) : /* @__PURE__ */ jsx(Info, { className: "h-3 w-3" }),
          status
        ] })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "bg-muted/50 space-y-3 rounded-lg border p-4", children: [
        /* @__PURE__ */ jsx("h3", { className: "text-sm font-semibold", children: "Payment Information" }),
        /* @__PURE__ */ jsxs("div", { className: "grid grid-cols-2 gap-4 text-sm", children: [
          /* @__PURE__ */ jsxs("div", { children: [
            /* @__PURE__ */ jsx("span", { className: "text-muted-foreground", children: "Transaction ID:" }),
            /* @__PURE__ */ jsx("p", { className: "font-mono font-medium", children: payment.transaction_id })
          ] }),
          /* @__PURE__ */ jsxs("div", { children: [
            /* @__PURE__ */ jsx("span", { className: "text-muted-foreground", children: "Amount:" }),
            /* @__PURE__ */ jsxs("p", { className: "text-lg font-medium", children: [
              "$",
              Number(payment.amount).toFixed(2)
            ] })
          ] }),
          /* @__PURE__ */ jsxs("div", { children: [
            /* @__PURE__ */ jsx("span", { className: "text-muted-foreground", children: "Payment Date:" }),
            /* @__PURE__ */ jsx("p", { className: "font-medium", children: paymentMeta.payment_date ? format(new Date(paymentMeta.payment_date), "MMM dd, yyyy") : "N/A" })
          ] }),
          /* @__PURE__ */ jsxs("div", { children: [
            /* @__PURE__ */ jsx("span", { className: "text-muted-foreground", children: "Submitted At:" }),
            /* @__PURE__ */ jsx("p", { className: "font-medium", children: format(new Date(payment.created_at), "MMM dd, yyyy HH:mm") })
          ] })
        ] })
      ] }),
      !!paymentInfo && /* @__PURE__ */ jsxs("div", { className: "bg-muted/50 space-y-3 rounded-lg border p-4", children: [
        /* @__PURE__ */ jsx("h3", { className: "text-sm font-semibold", children: "Submitted Payment Details" }),
        /* @__PURE__ */ jsx(Renderer, { value: paymentInfo })
      ] }),
      payment.media && payment.media.length > 0 && /* @__PURE__ */ jsxs("div", { className: "bg-muted/50 space-y-3 rounded-lg border p-4", children: [
        /* @__PURE__ */ jsx("h3", { className: "text-sm font-semibold", children: "Attachment" }),
        /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-3", children: [
          /* @__PURE__ */ jsx(FileText, { className: "text-muted-foreground h-8 w-8" }),
          /* @__PURE__ */ jsxs("div", { className: "flex-1", children: [
            /* @__PURE__ */ jsx("p", { className: "text-sm font-medium", children: payment.media[0].file_name }),
            /* @__PURE__ */ jsx("p", { className: "text-muted-foreground text-xs", children: "Transaction proof" })
          ] }),
          /* @__PURE__ */ jsx(Button, { size: "sm", variant: "outline", asChild: true, children: /* @__PURE__ */ jsxs("a", { href: payment.media[0].original_url, target: "_blank", rel: "noopener noreferrer", children: [
            /* @__PURE__ */ jsx(Download, { className: "mr-1 h-4 w-4" }),
            "Download"
          ] }) })
        ] })
      ] }),
      (status === "pending" || status === "rejected") && /* @__PURE__ */ jsxs(Fragment, { children: [
        /* @__PURE__ */ jsxs(Alert, { children: [
          /* @__PURE__ */ jsx(Info, { className: "h-4 w-4" }),
          /* @__PURE__ */ jsx(AlertDescription, { children: "Verifying this payment will automatically enroll the user in the purchased course/exam." })
        ] }),
        /* @__PURE__ */ jsxs("form", { onSubmit: handleVerify, className: "space-y-4", children: [
          /* @__PURE__ */ jsxs("div", { className: "space-y-2", children: [
            /* @__PURE__ */ jsx(Label, { htmlFor: "admin_notes", children: "Admin Notes (Optional)" }),
            /* @__PURE__ */ jsx(
              Textarea,
              {
                id: "admin_notes",
                name: "admin_notes",
                rows: 3,
                placeholder: "Add any notes about this verification...",
                value: adminNotes,
                onChange: (e) => setAdminNotes(e.target.value)
              }
            )
          ] }),
          /* @__PURE__ */ jsxs(DialogFooter, { className: "gap-2", children: [
            /* @__PURE__ */ jsx(Button, { type: "button", variant: "outline", onClick: onClose, children: "Cancel" }),
            /* @__PURE__ */ jsxs(Button, { type: "button", variant: "destructive", onClick: handleReject, children: [
              /* @__PURE__ */ jsx(XCircle, { className: "mr-1 h-4 w-4" }),
              "Reject"
            ] }),
            /* @__PURE__ */ jsxs(Button, { type: "submit", children: [
              /* @__PURE__ */ jsx(CheckCircle2, { className: "mr-1 h-4 w-4" }),
              "Verify & Enroll"
            ] })
          ] })
        ] })
      ] }),
      status !== "pending" && /* @__PURE__ */ jsx(DialogFooter, { children: /* @__PURE__ */ jsx(Button, { variant: "outline", onClick: onClose, children: "Close" }) })
    ] })
  ] }) });
};
export {
  VerifyPaymentModal as default
};
