# 🪑 Chair-Factory CRM

### Office Chair Repair CRM Blueprint

**Chair-Factory** is a specialized Customer Relationship Management (CRM) system built for managing office chair repairs, customer queries, warranty tracking, and automated marketing. This blueprint outlines the system’s architecture, core modules, data structure, user interfaces, and communication engine.

---

## 📦 Core Modules Overview

| Module                | Purpose                                                                 | Key Users           |
|-----------------------|-------------------------------------------------------------------------|---------------------|
| **A. Customer Portal** | Submit queries, check status, register complaints                       | Customers           |
| **B. Admin Dashboard** | Manage queries, update status, create marketing content, view reports   | Internal Staff/Admin|
| **C. Communication Engine** | Send automated status updates, offers, and coupons via email        | System (Automated)  |

---

## 🗃️ Data Structure

| Collection         | Key Fields                                                                 | Purpose                                      |
|--------------------|------------------------------------------------------------------------------|----------------------------------------------|
| **Customers**       | Name, Email, Phone, Address, Customer ID                                     | User tracking & marketing segmentation       |
| **Repair Queries**  | Query ID, Customer ID, Description, Status, Resolution Notes, Date Submitted| Main service tracking                        |
| **Repairs/Warranty**| Repair ID, Query ID, Chair Details, Warranty End Date, Technician Name      | Validate warranty claims                     |
| **Marketing Offers**| Offer ID, Discount Code, Description, Start/End Dates, Target Segment       | Email campaigns & web banners                |
| **Web Content**     | Key, Value                                                                  | Dynamic website content updates              |

---

## 🌐 Customer Portal Pages

### 1. **New Query Submission**
- Fields: Name, Email, Phone, Chair Type, Issue Description, Preferred Date/Time
- Action: Creates new query with status `New`, emails Query ID to customer

### 2. **Query Status Check**
- Input: Query ID
- Output: Current status, resolution notes, repair date

### 3. **Complaint / Warranty Claim**
- Input: Repair ID, Problem Description
- Validation: Checks warranty validity
- If valid: New query with status `Warranty Claim` is created

---

## 🔧 Admin Dashboard Pages

### Dashboard 1: **Query Management**
- Table view with filters by status, date, technician
- Links to detail view

### Dashboard 2: **Query Detail View**
- Fields: Status, Technician Assignment, Resolution Notes
- Conditional: If status = Solved → Create Warranty record (auto add +90 days)
- Triggers customer email updates

### Dashboard 3: **Marketing & Content Management**

#### A. Dynamic Web Content
- Editable fields (e.g., Homepage Banner)
- Instant update to website on save

#### B. Offers & Coupons
- Fields: Code, Description, Dates, Email Template
- Used by Communication Engine

### Dashboard 4: **Reporting**
- Query Volume by Month
- Resolution Rate
- Most Common Chair Issues
- Warranty Claim Rate

---

## 📬 Communication Engine

| Email Type           | Trigger                                | Data Used                              |
|----------------------|----------------------------------------|----------------------------------------|
| **Query Confirmation**| Customer submits new query             | Query ID, Customer Name                |
| **Status Update**     | Admin updates status                   | Query ID, New Status, Resolution Notes |
| **General Offers**    | Manual trigger from Dashboard 3B       | Customers + Offer Details              |
| **Festival Coupons**  | Scheduled (e.g., Diwali, Christmas)    | Customers + Offer Details              |

---

## 📈 How to Use for Marketing

1. **Create Offer**:  
   Go to *Dashboard 3B* → Create new offer (`FESTIVAL20`, 20% off)

2. **Update Website**:  
   Go to *Dashboard 3A* → Change `HomepageBannerText` to  
   `"Use code FESTIVAL20 for 20% off all repairs!"`

3. **Send Campaign**:  
   Use *Communication Engine* → Select `FESTIVAL20` → Send to all customers

💡 By centralizing content in the **Marketing Offers** collection, you maintain consistency across email, banners, and campaigns.

---

## 🚀 Next Steps

Would you like to:
- Start planning the **wireframes for Customer Portal** pages?
- Or detail the **fields required for the Warranty Claim** page?

---

## 📄 License

This project blueprint is open for development and customization based on business needs.

