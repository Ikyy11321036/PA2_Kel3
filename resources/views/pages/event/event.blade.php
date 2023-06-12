@extends('template.layout')
@section('content')

<style>
<<<<<<< HEAD
  :root {
    --primary-clr: #b38add;
  }

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
  }



  .container {
    position: relative;
    width: 1200px;
    min-height: 850px;
    margin: 0 auto;
    padding: 5px;
    color: #fff;
    display: flex;

    border-radius: 10px;
    background-color: #373c4f;
  }

  .left {
    width: 60%;
    padding: 20px;
  }

  .calendar {
    position: relative;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    justify-content: space-between;
    color: #878895;
    border-radius: 5px;
    background-color: #fff;
  }

  /* set after behind the main element */
  .calendar::before,
  .calendar::after {
    content: "";
    position: absolute;
    top: 50%;
    left: 100%;
    width: 12px;
    height: 97%;
    border-radius: 0 5px 5px 0;
    background-color: #d3d4d6d7;
    transform: translateY(-50%);
  }

  .calendar::before {
    height: 94%;
    left: calc(100% + 12px);
    background-color: rgb(153, 153, 153);
  }

  .calendar .month {
    width: 100%;
    height: 150px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 50px;
    font-size: 1.2rem;
    font-weight: 500;
    text-transform: capitalize;
  }

  .calendar .month .prev,
  .calendar .month .next {
    cursor: pointer;
  }

  .calendar .month .prev:hover,
  .calendar .month .next:hover {
    color: var(--primary-clr);
  }

  .calendar .weekdays {
    width: 100%;
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
    font-size: 1rem;
    font-weight: 500;
    text-transform: capitalize;
  }

  .weekdays div {
    width: 14.28%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .calendar .days {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 0 20px;
    font-size: 1rem;
    font-weight: 500;
    margin-bottom: 20px;
  }

  .calendar .days .day {
    width: 14.28%;
    height: 90px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    color: var(--primary-clr);
    border: 1px solid #f5f5f5;
  }

  .calendar .days .day:nth-child(7n + 1) {
    border-left: 2px solid #f5f5f5;
  }

  .calendar .days .day:nth-child(7n) {
    border-right: 2px solid #f5f5f5;
  }

  .calendar .days .day:nth-child(-n + 7) {
    border-top: 2px solid #f5f5f5;
  }

  .calendar .days .day:nth-child(n + 29) {
    border-bottom: 2px solid #f5f5f5;
  }

  .calendar .days .day:not(.prev-date, .next-date):hover {
    color: #fff;
    background-color: var(--primary-clr);
  }

  .calendar .days .prev-date,
  .calendar .days .next-date {
    color: #b3b3b3;
  }

  .calendar .days .active {
    position: relative;
    font-size: 2rem;
    color: #fff;
    background-color: var(--primary-clr);
  }

  .calendar .days .active::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    box-shadow: 0 0 10px 2px var(--primary-clr);
  }

  .calendar .days .today {
    font-size: 2rem;
  }

  .calendar .days .event {
    position: relative;
  }

  .calendar .days .event::after {
    content: "";
    position: absolute;
    bottom: 10%;
    left: 50%;
    width: 75%;
    height: 6px;
    border-radius: 30px;
    transform: translateX(-50%);
    background-color: var(--primary-clr);
  }

  .calendar .days .day:hover.event::after {
    background-color: #fff;
  }

  .calendar .days .active.event::after {
    background-color: #fff;
    bottom: 20%;
  }

  .calendar .days .active.event {
    padding-bottom: 10px;
  }

  .calendar .goto-today {
    width: 100%;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 5px;
    padding: 0 20px;
    margin-bottom: 20px;
    color: var(--primary-clr);
  }

  .calendar .goto-today .goto {
    display: flex;
    align-items: center;
    border-radius: 5px;
    overflow: hidden;
    border: 1px solid var(--primary-clr);
  }

  .calendar .goto-today .goto input {
    width: 100%;
    height: 30px;
    outline: none;
    border: none;
    border-radius: 5px;
    padding: 0 20px;
    color: var(--primary-clr);
    border-radius: 5px;
  }

  .calendar .goto-today button {
    padding: 5px 10px;
    border: 1px solid var(--primary-clr);
    border-radius: 5px;
    background-color: transparent;
    cursor: pointer;
    color: var(--primary-clr);
  }

  .calendar .goto-today button:hover {
    color: #fff;
    background-color: var(--primary-clr);
  }

  .calendar .goto-today .goto button {
    border: none;
    border-left: 1px solid var(--primary-clr);
    border-radius: 0;
  }

  .container .right {
    position: relative;
    width: 40%;
    min-height: 100%;
    padding: 20px 0;
  }

  .right .today-date {
    width: 100%;
    height: 50px;
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    align-items: center;
    justify-content: space-between;
    padding: 0 40px;
    padding-left: 70px;
    margin-top: 50px;
    margin-bottom: 20px;
    text-transform: capitalize;
  }

  .right .today-date .event-day {
    font-size: 2rem;
    font-weight: 500;
  }

  .right .today-date .event-date {
    font-size: 1rem;
    font-weight: 400;
    color: #878895;
  }

  .events {
    width: 100%;
    height: 100%;
    max-height: 600px;
    overflow-x: hidden;
    overflow-y: auto;
    display: flex;
    flex-direction: column;
    padding-left: 4px;
  }

  .events .event {
    position: relative;
    width: 95%;
    min-height: 70px;
    display: flex;
    justify-content: center;
    flex-direction: column;
    gap: 5px;
    padding: 0 20px;
    padding-left: 50px;
    color: #fff;
    background: linear-gradient(90deg, #3f4458, transparent);
    cursor: pointer;
  }

  /* even event */
  .events .event:nth-child(even) {
    background: transparent;
  }

  .events .event:hover {
    background: linear-gradient(90deg, var(--primary-clr), transparent);
  }

  .events .event .title {
    display: flex;
    align-items: center;
    pointer-events: none;
  }

  .events .event .title .event-title {
    font-size: 1rem;
    font-weight: 400;
    margin-left: 20px;
  }

  .events .event i {
    color: var(--primary-clr);
    font-size: 0.5rem;
  }

  .events .event:hover i {
    color: #fff;
  }

  .events .event .event-time {
    font-size: 0.8rem;
    font-weight: 400;
    color: #878895;
    margin-left: 15px;
    pointer-events: none;
  }

  .events .event:hover .event-time {
    color: #fff;
  }

  /* add tick in event after */
  .events .event::after {
    content: "✓";
    position: absolute;
    top: 50%;
    right: 0;
    font-size: 3rem;
    line-height: 1;
    display: none;
    align-items: center;
    justify-content: center;
    opacity: 0.3;
    color: var(--primary-clr);
    transform: translateY(-50%);
  }

  .events .event:hover::after {
    display: flex;
  }

  .add-event {
    position: absolute;
    bottom: 30px;
    right: 30px;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    color: #878895;
    border: 2px solid #878895;
    opacity: 0.5;
    border-radius: 50%;
    background-color: transparent;
    cursor: pointer;
  }

  .add-event:hover {
    opacity: 1;
  }

  .add-event i {
    pointer-events: none;
  }

  .events .no-event {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    font-weight: 500;
    color: #878895;
  }

  .add-event-wrapper {
    position: absolute;
    bottom: 100px;
    left: 50%;
    width: 90%;
    max-height: 0;
    overflow: hidden;
    border-radius: 5px;
    background-color: #fff;
    transform: translateX(-50%);
    transition: max-height 0.5s ease;
  }

  .add-event-wrapper.active {
    max-height: 300px;
  }

  .add-event-header {
    width: 100%;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
    color: #373c4f;
    border-bottom: 1px solid #f5f5f5;
  }

  .add-event-header .close {
    font-size: 1.5rem;
    cursor: pointer;
  }

  .add-event-header .close:hover {
    color: var(--primary-clr);
  }

  .add-event-header .title {
    font-size: 1.2rem;
    font-weight: 500;
  }

  .add-event-body {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    gap: 5px;
    padding: 20px;
  }

  .add-event-body .add-event-input {
    width: 100%;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
  }

  .add-event-body .add-event-input input {
    width: 100%;
    height: 100%;
    outline: none;
    border: none;
    border-bottom: 1px solid #f5f5f5;
    padding: 0 10px;
    font-size: 1rem;
    font-weight: 400;
    color: #373c4f;
  }

  .add-event-body .add-event-input input::placeholder {
    color: #a5a5a5;
  }

  .add-event-body .add-event-input input:focus {
    border-bottom: 1px solid var(--primary-clr);
  }

  .add-event-body .add-event-input input:focus::placeholder {
    color: var(--primary-clr);
  }

  .add-event-footer {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
  }

  .add-event-footer .add-event-btn {
    height: 40px;
    font-size: 1rem;
    font-weight: 500;
    outline: none;
    border: none;
    color: #fff;
    background-color: var(--primary-clr);
    border-radius: 5px;
    cursor: pointer;
    padding: 5px 10px;
    border: 1px solid var(--primary-clr);
  }

  .add-event-footer .add-event-btn:hover {
    background-color: transparent;
    color: var(--primary-clr);
  }

  /* media queries */

  @media screen and (max-width: 1000px) {
    body {
      align-items: flex-start;
      justify-content: flex-start;
    }

    .container {
      min-height: 100vh;
      flex-direction: column;
      border-radius: 0;
    }

    .container .left {
      width: 100%;
      height: 100%;
      padding: 20px 0;
    }

    .container .right {
      width: 100%;
      height: 100%;
      padding: 20px 0;
    }

    .calendar::before,
    .calendar::after {
      top: 100%;
      left: 50%;
      width: 97%;
      height: 12px;
      border-radius: 0 0 5px 5px;
      transform: translateX(-50%);
    }

    .calendar::before {
      width: 94%;
      top: calc(100% + 12px);
    }

    .events {
      padding-bottom: 340px;
    }

    .add-event-wrapper {
      bottom: 100px;
    }
  }

  @media screen and (max-width: 500px) {
    .calendar .month {
      height: 75px;
    }

    .calendar .weekdays {
      height: 50px;
    }

    .calendar .days .day {
      height: 40px;
      font-size: 0.8rem;
    }

    .calendar .days .day.active,
    .calendar .days .day.today {
      font-size: 1rem;
    }

    .right .today-date {
      padding: 20px;
    }
  }

  .credits {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    text-align: center;
    padding: 10px;
    font-size: 12px;
    color: #fff;
    background-color: #b38add;
  }

  .credits a {
    text-decoration: none;
    font-weight: 600;
  }

  .credits a:hover {
    text-decoration: underline;
  }
</style>

<div class="page-content-wrapper">
  <div class="page-content">
    <div class="page-bar">
      <div class="page-title-breadcrumb">
        <div class=" pull-left">
          <div class="page-title">Jadwal</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
          @auth
          <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{  route('dashboard') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
          </li>
          @else
          <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('guest') }}">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
            @endauth
          <li class="active">Jadwal</li>
        </ol>
      </div>
    </div>
    <div class="container">
      <div class="left">
        <div class="calendar">
          <div class="month">
            <i class="fas fa-angle-left prev"></i>
            <div class="date">december 2015</div>
            <i class="fas fa-angle-right next"></i>
          </div>
          <div class="weekdays">
            <div>Minggu</div>
            <div>Senin</div>
            <div>Selasa</div>
            <div>Rabu</div>
            <div>Kamis</div>
            <div>Jumat</div>
            <div>Sabtu</div>
          </div>
          <div class="days"></div>
          <div class="goto-today">
            <div class="goto">
              <input type="text" placeholder="mm/yyyy" class="date-input" />
              <button class="goto-btn">Go</button>
            </div>
            <button class="today-btn">Hari Ini</button>
          </div>
        </div>
      </div>
      <div class="right">
        <div class="today-date">
          <div class="event-day">wed</div>
          <div class="event-date">12th december 2022</div>
        </div>
        <div class="events"></div>
        <div class="add-event-wrapper">
          <div class="add-event-header">
            <div class="title">Tambah Jadwal</div>
            <i class="fas fa-times close"></i>
          </div>
          <div class="add-event-body">
            <div class="add-event-input">
              <input type="text" placeholder="Judul Jadwal" class="event-name" />
            </div>
            <div class="add-event-input">
              <input type="text" placeholder="Waktu Mulai" class="event-time-from" />
            </div>
            <div class="add-event-input">
              <input type="text" placeholder="Waktu Selesai" class="event-time-to" />
            </div>
          </div>
          <div class="add-event-footer">
            <button class="add-event-btn">Menambah</button>
          </div>
        </div>
      </div>
      <button class="add-event">
        <i class="fas fa-plus"></i>
      </button>
    </div>
    <!-- Dialog Box-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous">
    </script>
    <script src="app.js"></script>
  </div>
</div>
</div>
</div>
</div>

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addEventTitle">Add Event</h5>
        <h5 class="modal-title" id="editEventTitle">Edit Event</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="">
          <input type="hidden" id="id" name="id">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Title</label>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Title" name="title" id="title">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 mb-4">
              <label>Category</label>
              <select class="form-select" id="categorySelect">
                <option id="work" value="fc-event-success">Work</option>
                <option id="personal" value="fc-event-warning">Personal</option>
                <option id="important" value="fc-event-primary">Important</option>
                <option id="travel" value="fc-event-danger">Travel</option>
                <option id="friends" value="fc-event-info">Friends</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label>Start Date</label>
                <input type="text" class="form-control datetimepicker" placeholder="Start Date" name="starts_at" id="starts-at">
              </div>
            </div>
            <div class="col-6">

              <div class="form-group">
                <label>End Date</label>
                <input type="text" class="form-control datetimepicker" placeholder="End Date" name="ends_at" id="ends-at">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Event Details</label>
                <textarea id="eventDetails" name="eventDetails" placeholder="Enter Details" class="form-control"></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer bg-whitesmoke pr-0">
            <button type="button" class="btn btn-round btn-primary" id="add-event">Add
              Event</button>
            <button type="button" class="btn btn-round btn-primary" id="edit-event">Edit
              Event</button>
            <button type="button" id="close" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<script>
  const calendar = document.querySelector(".calendar"),
    date = document.querySelector(".date"),
    daysContainer = document.querySelector(".days"),
    prev = document.querySelector(".prev"),
    next = document.querySelector(".next"),
    todayBtn = document.querySelector(".today-btn"),
    gotoBtn = document.querySelector(".goto-btn"),
    dateInput = document.querySelector(".date-input"),
    eventDay = document.querySelector(".event-day"),
    eventDate = document.querySelector(".event-date"),
    eventsContainer = document.querySelector(".events"),
    addEventBtn = document.querySelector(".add-event"),
    addEventWrapper = document.querySelector(".add-event-wrapper "),
    addEventCloseBtn = document.querySelector(".close "),
    addEventTitle = document.querySelector(".event-name "),
    addEventFrom = document.querySelector(".event-time-from "),
    addEventTo = document.querySelector(".event-time-to "),
    addEventSubmit = document.querySelector(".add-event-btn ");

  let today = new Date();
  let activeDay;
  let month = today.getMonth();
  let year = today.getFullYear();

  const months = [
    "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember",
  ];

  const eventsArr = [];
  getEvents();
  console.log(eventsArr);

  //function to add days in days with class day and prev-date next-date on previous month and next month days and active on today
  function initCalendar() {
    const firstDay = new Date(year, month, 1);
    const lastDay = new Date(year, month + 1, 0);
    const prevLastDay = new Date(year, month, 0);
    const prevDays = prevLastDay.getDate();
    const lastDate = lastDay.getDate();
    const day = firstDay.getDay();
    const nextDays = 7 - lastDay.getDay() - 1;

    date.innerHTML = months[month] + " " + year;

    let days = "";

    for (let x = day; x > 0; x--) {
      days += `<div class="day prev-date">${prevDays - x + 1}</div>`;
    }

    for (let i = 1; i <= lastDate; i++) {
      //check if event is present on that day
      let event = false;
      eventsArr.forEach((eventObj) => {
        if (
          eventObj.day === i &&
          eventObj.month === month + 1 &&
          eventObj.year === year
        ) {
          event = true;
        }
      });
      if (
        i === new Date().getDate() &&
        year === new Date().getFullYear() &&
        month === new Date().getMonth()
      ) {
        activeDay = i;
        getActiveDay(i);
        updateEvents(i);
        if (event) {
          days += `<div class="day today active event">${i}</div>`;
        } else {
          days += `<div class="day today active">${i}</div>`;
        }
      } else {
        if (event) {
          days += `<div class="day event">${i}</div>`;
        } else {
          days += `<div class="day ">${i}</div>`;
        }
      }
    }

    for (let j = 1; j <= nextDays; j++) {
      days += `<div class="day next-date">${j}</div>`;
    }
    daysContainer.innerHTML = days;
    addListner();
  }

  //function to add month and year on prev and next button
  function prevMonth() {
    month--;
    if (month < 0) {
      month = 11;
      year--;
    }
    initCalendar();
  }

  function nextMonth() {
    month++;
    if (month > 11) {
      month = 0;
      year++;
    }
    initCalendar();
  }

  prev.addEventListener("click", prevMonth);
  next.addEventListener("click", nextMonth);

  initCalendar();

  //function to add active on day
  function addListner() {
    const days = document.querySelectorAll(".day");
    days.forEach((day) => {
      day.addEventListener("click", (e) => {
        getActiveDay(e.target.innerHTML);
        updateEvents(Number(e.target.innerHTML));
        activeDay = Number(e.target.innerHTML);
        //remove active
        days.forEach((day) => {
          day.classList.remove("active");
        });
        //if clicked prev-date or next-date switch to that month
        if (e.target.classList.contains("prev-date")) {
          prevMonth();
          //add active to clicked day afte month is change
          setTimeout(() => {
            //add active where no prev-date or next-date
            const days = document.querySelectorAll(".day");
            days.forEach((day) => {
              if (
                !day.classList.contains("prev-date") &&
                day.innerHTML === e.target.innerHTML
              ) {
                day.classList.add("active");
              }
            });
          }, 100);
        } else if (e.target.classList.contains("next-date")) {
          nextMonth();
          //add active to clicked day afte month is changed
          setTimeout(() => {
            const days = document.querySelectorAll(".day");
            days.forEach((day) => {
              if (
                !day.classList.contains("next-date") &&
                day.innerHTML === e.target.innerHTML
              ) {
                day.classList.add("active");
              }
            });
          }, 100);
        } else {
          e.target.classList.add("active");
        }
      });
    });
  }

  todayBtn.addEventListener("click", () => {
    today = new Date();
    month = today.getMonth();
    year = today.getFullYear();
    initCalendar();
  });

  dateInput.addEventListener("input", (e) => {
    dateInput.value = dateInput.value.replace(/[^0-9/]/g, "");
    if (dateInput.value.length === 2) {
      dateInput.value += "/";
    }
    if (dateInput.value.length > 7) {
      dateInput.value = dateInput.value.slice(0, 7);
    }
    if (e.inputType === "deleteContentBackward") {
      if (dateInput.value.length === 3) {
        dateInput.value = dateInput.value.slice(0, 2);
      }
    }
  });

  gotoBtn.addEventListener("click", gotoDate);

  function gotoDate() {
    console.log("here");
    const dateArr = dateInput.value.split("/");
    if (dateArr.length === 2) {
      if (dateArr[0] > 0 && dateArr[0] < 13 && dateArr[1].length === 4) {
        month = dateArr[0] - 1;
        year = dateArr[1];
        initCalendar();
        return;
      }
    }
    alert("Invalid Date");
  }

  //function get active day day name and date and update eventday eventdate
  function getActiveDay(date) {
    const day = new Date(year, month, date);
    const dayName = day.toString().split(" ")[0];
    eventDay.innerHTML = dayName;
    eventDate.innerHTML = date + " " + months[month] + " " + year;
  }

  //function update events when a day is active
  function updateEvents(date) {
    let events = "";
    eventsArr.forEach((event) => {
      if (
        date === event.day &&
        month + 1 === event.month &&
        year === event.year
      ) {
        event.events.forEach((event) => {
          events += `<div class="event">
            <div class="title">
              <i class="fas fa-circle"></i>
              <h3 class="event-title">${event.title}</h3>
            </div>
            <div class="event-time">
              <span class="event-time">${event.time}</span>
            </div>
        </div>`;
        });
      }
    });
    if (events === "") {
      events = `<div class="no-event">
            <h3>Tidak Ada Jadwal</h3>
        </div>`;
    }
    eventsContainer.innerHTML = events;
    saveEvents();
  }

  //function to add event
  addEventBtn.addEventListener("click", () => {
    addEventWrapper.classList.toggle("active");
  });

  addEventCloseBtn.addEventListener("click", () => {
    addEventWrapper.classList.remove("active");
  });

  document.addEventListener("click", (e) => {
    if (e.target !== addEventBtn && !addEventWrapper.contains(e.target)) {
      addEventWrapper.classList.remove("active");
    }
  });

  //allow 50 chars in eventtitle
  addEventTitle.addEventListener("input", (e) => {
    addEventTitle.value = addEventTitle.value.slice(0, 60);
  });

  function defineProperty() {
    var osccred = document.createElement("div");
    osccred.style.position = "absolute";
    osccred.style.bottom = "0";
    osccred.style.right = "0";
    osccred.style.fontSize = "10px";
    osccred.style.color = "#ccc";
    osccred.style.fontFamily = "sans-serif";
    osccred.style.padding = "5px";
    osccred.style.background = "#fff";
    osccred.style.borderTopLeftRadius = "5px";
    osccred.style.borderBottomRightRadius = "5px";
    osccred.style.boxShadow = "0 0 5px #ccc";
    document.body.appendChild(osccred);
  }

  defineProperty();

  //allow only time in eventtime from and to
  addEventFrom.addEventListener("input", (e) => {
    addEventFrom.value = addEventFrom.value.replace(/[^0-9:]/g, "");
    if (addEventFrom.value.length === 2) {
      addEventFrom.value += ":";
    }
    if (addEventFrom.value.length > 5) {
      addEventFrom.value = addEventFrom.value.slice(0, 5);
    }
  });

  addEventTo.addEventListener("input", (e) => {
    addEventTo.value = addEventTo.value.replace(/[^0-9:]/g, "");
    if (addEventTo.value.length === 2) {
      addEventTo.value += ":";
    }
    if (addEventTo.value.length > 5) {
      addEventTo.value = addEventTo.value.slice(0, 5);
    }
  });

  //function to add event to eventsArr
  addEventSubmit.addEventListener("click", () => {
    const eventTitle = addEventTitle.value;
    const eventTimeFrom = addEventFrom.value;
    const eventTimeTo = addEventTo.value;
    if (eventTitle === "" || eventTimeFrom === "" || eventTimeTo === "") {
      alert("Please fill all the fields");
      return;
    }

    //check correct time format 24 hour
    const timeFromArr = eventTimeFrom.split(":");
    const timeToArr = eventTimeTo.split(":");
    if (
      timeFromArr.length !== 2 ||
      timeToArr.length !== 2 ||
      timeFromArr[0] > 23 ||
      timeFromArr[1] > 59 ||
      timeToArr[0] > 23 ||
      timeToArr[1] > 59
    ) {
      alert("Invalid Time Format");
      return;
    }

    const timeFrom = convertTime(eventTimeFrom);
    const timeTo = convertTime(eventTimeTo);

    //check if event is already added
    let eventExist = false;
    eventsArr.forEach((event) => {
      if (
        event.day === activeDay &&
        event.month === month + 1 &&
        event.year === year
      ) {
        event.events.forEach((event) => {
          if (event.title === eventTitle) {
            eventExist = true;
          }
        });
      }
    });
    if (eventExist) {
      alert("Event already added");
      return;
    }
    const newEvent = {
      title: eventTitle,
      time: timeFrom + " - " + timeTo,
    };
    console.log(newEvent);
    console.log(activeDay);
    let eventAdded = false;
    if (eventsArr.length > 0) {
      eventsArr.forEach((item) => {
        if (
          item.day === activeDay &&
          item.month === month + 1 &&
          item.year === year
        ) {
          item.events.push(newEvent);
          eventAdded = true;
        }
      });
    }

    if (!eventAdded) {
      eventsArr.push({
        day: activeDay,
        month: month + 1,
        year: year,
        events: [newEvent],
      });
    }

    console.log(eventsArr);
    addEventWrapper.classList.remove("active");
    addEventTitle.value = "";
    addEventFrom.value = "";
    addEventTo.value = "";
    updateEvents(activeDay);
    //select active day and add event class if not added
    const activeDayEl = document.querySelector(".day.active");
    if (!activeDayEl.classList.contains("event")) {
      activeDayEl.classList.add("event");
    }
  });

  //function to delete event when clicked on event
  eventsContainer.addEventListener("click", (e) => {
    if (e.target.classList.contains("event")) {
      if (confirm("Apakah Kamu Yakin Menghapus Jadwal Tersebut?")) {
        const eventTitle = e.target.children[0].children[1].innerHTML;
        eventsArr.forEach((event) => {
          if (
            event.day === activeDay &&
            event.month === month + 1 &&
            event.year === year
          ) {
            event.events.forEach((item, index) => {
              if (item.title === eventTitle) {
                event.events.splice(index, 1);
              }
            });
            //if no events left in a day then remove that day from eventsArr
            if (event.events.length === 0) {
              eventsArr.splice(eventsArr.indexOf(event), 1);
              //remove event class from day
              const activeDayEl = document.querySelector(".day.active");
              if (activeDayEl.classList.contains("event")) {
                activeDayEl.classList.remove("event");
              }
            }
          }
        });
        updateEvents(activeDay);
      }
    }
  });

  //function to save events in local storage
  function saveEvents() {
    localStorage.setItem("events", JSON.stringify(eventsArr));
  }

  //function to get events from local storage
  function getEvents() {
    //check if events are already saved in local storage then return event else nothing
    if (localStorage.getItem("events") === null) {
      return;
    }
    eventsArr.push(...JSON.parse(localStorage.getItem("events")));
  }

  function convertTime(time) {
    //convert time to 24 hour format
    let timeArr = time.split(":");
    let timeHour = timeArr[0];
    let timeMin = timeArr[1];
    let timeFormat = timeHour >= 12 ? "PM" : "AM";
    timeHour = timeHour % 12 || 12;
    time = timeHour + ":" + timeMin + " " + timeFormat;
    return time;
  }
=======
    /* Overall body and content */
body { 
    height: 100%;
    width: 100%;
    margin: 0;
    background: #005C97;    
    background: -webkit-linear-gradient(left, #363795, #005C97);
    background: -moz-linear-gradient(left, #363795, #005C97);
    background: -o-linear-gradient(left, #363795, #005C97);
    background: linear-gradient(to right, #363795, #005C97); 
    font-family: Helvetica;
} 
.content {
    overflow: none;
    max-width: 790px;
    padding: 0px 0;
    height: 500px;
    position: relative;
    margin: 20px auto;
    background: #52A0FD;
    background: -moz-linear-gradient(right,  #52A0FD 0%, #00C9FB 80%, #00C9FB 100%);
    background: -webkit-linear-gradient(right,  #52A0FD 0%, #00C9FB 80%, #00C9FB 100%);
    background: linear-gradient(to left,  #52A0FD 0%, #00C9FB 80%, #00C9FB 100%);    
    border-radius: 3px;
    box-shadow: 3px 8px 16px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
    -moz-box-shadow: 3px 8px 16px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
    -webkit-box-shadow: 3px 8px 16px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
}

/*  Events display */
.events-container {
    overflow-y: scroll;
    height: 100%;
    float: right;
    margin: 0px auto; 
    font: 13px Helvetica, Arial, sans-serif; 
    display: inline-block; 
    padding: 0 10px;
    border-bottom-right-radius: 3px;
    border-top-right-radius: 3px;
}
.events-container:after{
    clear:both;
}
.event-card {
    padding: 20px 0;
    width: 350px;
    margin: 20px auto;
    display: block;
    background: #fff;
    border-left: 10px solid #52A0FD;
    border-radius: 3px;
    box-shadow: 3px 8px 16px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
    -moz-box-shadow: 3px 8px 16px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
    -webkit-box-shadow: 3px 8px 16px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
}
.event-count, .event-name, .event-cancelled {
    display: inline;
    padding: 0 10px;
    font-size: 1rem;
}
.event-count {
    color: #52A0FD;
    text-align: right;
}
.event-name {
    padding-right:0;
    text-align: left;
}
.event-cancelled {
    color: #FF1744;
    text-align: right;
}

/*  Calendar wrapper */
.calendar-container  { 
    float: left;
    position: relative;
    margin: 0px auto; 
    height: 100%;
    background: #fff;
    font: 13px Helvetica, Arial, san-serif; 
    display: inline-block; 
    border-bottom-left-radius: 3px;
    border-top-left-radius: 3px;
}
.calendar-container:after{
    clear:both;
}
.calendar {
    display: table;
}

/* Calendar Header */
.year-header { 
    background: #52A0FD;
    background: -moz-linear-gradient(left,  #52A0FD 0%, #00C9FB 80%, #00C9FB 100%);
    background: -webkit-linear-gradient(left,  #52A0FD 0%, #00C9FB 80%, #00C9FB 100%);
    background: linear-gradient(to right,  #52A0FD 0%, #00C9FB 80%, #00C9FB 100%);    
    font-family: Helvetica;
    box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
    -moz-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
    -webkit-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
    height: 40px; 
    text-align: center;
    position: relative; 
    color:#fff; 
    border-top-left-radius: 3px;
} 
.year-header span { 
    display:inline-block; 
    font-size: 20px;
    line-height:40px; 
}
.left-button, .right-button { 
    cursor: pointer;
    width:28px; 
    text-align:center; 
    position:absolute; 
} 
.left-button { 
    left:0; 
    -webkit-border-top-left-radius: 5px; 
    -moz-border-radius-topleft: 5px; 
    border-top-left-radius: 5px; 
} 
.right-button { 
    right:0; 
    top:0; 
    -webkit-border-top-right-radius: 5px; 
    -moz-border-radius-topright: 5px; 
    border-top-right-radius: 5px; 
} 
.left-button:hover {
    background: #3FADFF;
}
.right-button:hover { 
    background: #00C1FF;
}

/* Buttons */
.button{
    cursor: pointer;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    outline: none;
    font-size: 1rem;
    border-radius: 25px;
    padding: 0.65rem 1.9rem;
    transition: .2s ease all;
    color: white;
    border: none;
    box-shadow: -1px 10px 20px #9BC6FD;
    background: #52A0FD;
    background: -moz-linear-gradient(left,  #52A0FD 0%, #00C9FB 80%, #00C9FB 100%);
    background: -webkit-linear-gradient(left,  #52A0FD 0%, #00C9FB 80%, #00C9FB 100%);
    background: linear-gradient(to right,  #52A0FD 0%, #00C9FB 80%, #00C9FB 100%);
}
#cancel-button {
    box-shadow: -1px 10px 20px #FF7DAE;
    background: #FF1744;
    background: -moz-linear-gradient(left,  #FF1744 0%, #FF5D95 80%, #FF5D95 100%);
    background: -webkit-linear-gradient(left,  #FF1744 0%, #FF5D95 80%, #FF5D95 100%);
    background: linear-gradient(to right,  #FF1744 0%, #FF5D95 80%, #FF5D95 100%);
}
#add-button {
    display: block;
    position: absolute;
    right:20px;
    bottom: 20px;
}
#add-button:hover, #ok-button:hover, #cancel-button:hover {
    transform: scale(1.03);
}
#add-button:active, #ok-button:active, #cancel-button:active {
    transform: translateY(3px) scale(.97);
}

/* Days/months tables */
.days-table, .dates-table, .months-table { 
    border-collapse:separate; 
    text-align: center;
} 
.day { 
    height: 26px;
    width: 26px;
    padding: 0 10px;
    line-height: 26px; 
    border: 2px solid transparent;
    text-transform:uppercase; 
    font-size:90%; 
    color:#9e9e9e; 
} 
.month {
    cursor: default;
    height: 26px;
    width: 26px;
    padding: 0 2px;
    padding-top:10px;
    line-height: 26px; 
    text-transform:uppercase; 
    font-size: 11px; 
    color:#9e9e9e; 
    transition: all 250ms;
}
.active-month {
    font-weight: bold;
    font-size: 14px;
    color: #FF1744;
    text-shadow: 0 1px 4px RGBA(255, 50, 120, .8);
}
.month:hover {
    color: #FF1744;
    text-shadow: 0 1px 4px RGBA(255, 50, 120, .8);
}

/*  Dates table */
.table-date {
    cursor: default;
    color:#2b2b2b; 
    height:26px;
    width: 26px;
    font-size: 15px;
    padding: 10px;
    line-height:26px; 
    text-align:center; 
    border-radius: 50%;
    border: 2px solid transparent;
    transition: all 250ms;
}
.table-date:not(.nil):hover { 
    border-color: #FF1744;
    box-shadow: 0 2px 6px RGBA(255, 50, 120, .9);
}
.event-date {
    border-color:#52A0FD;
    box-shadow: 0 2px 8px RGBA(130, 180, 255, .9);
}
.active-date{ 
    background: #FF1744;
    box-shadow: 0 2px 8px RGBA(255, 50, 120, .9);
    color: #fff;
}
.event-date.active-date {
    background: #52A0FD;
    box-shadow: 0 2px 8px RGBA(130, 180, 255, .9);
}

/* input dialog */
.dialog{
    z-index: 5;
    background: #fff;
    position:absolute;
    width:415px;
    height: 500px;
    left:387px;
    border-top-right-radius:3px;
    border-bottom-right-radius: 3px;
    display:none;
    border-left: 1px #aaa solid;
}
.dialog-header {
    margin: 20px;
    color:#333;
    text-align: center;
}
.form-container {
    margin-top:25%;
}
.form-label {
    color:#333;
}
.input {
    border:none;
    background: none;
    border-bottom: 1px #aaa solid;
    display:block;
    margin-bottom:50px;
    width: 200px;
    height: 20px;
    text-align: center;
    transition: border-color 250ms;
}
.input:focus {
    outline:none;
    border-color: #00C9FB;
}
.error-input {
    border-color: #FF1744;
}

/* Tablets and smaller */
@media only screen and (max-width: 780px) {
    .content {
        overflow: visible;
        position:relative;
        max-width: 100%;
        width: 370px;
        height: 100%;
        background: #52A0FD;
        background: -moz-linear-gradient(left,  #52A0FD 0%, #00C9FB 80%, #00C9FB 100%);
        background: -webkit-linear-gradient(left,  #52A0FD 0%, #00C9FB 80%, #00C9FB 100%);
        background: linear-gradient(to right,  #52A0FD 0%, #00C9FB 80%, #00C9FB 100%);  
    }
    .dialog {
        width:370px;
        height: 450px;
        border-radius: 3px;
        top:0;
        left:0;
    }
    .events-container {
        float:none;
        overflow: visible;
        margin: 0 auto;
        padding: 0;
        display: block;
        left: 0;
        border-radius: 3px;
    }

    .calendar-container {
        float: none;
        padding: 0;
        margin: 0 auto;
        margin-right: 0;
        display: block;
        left: 0;
        border-radius: 3px;
        box-shadow: 3px 8px 16px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
        -moz-box-shadow: 3px 8px 16px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
        -webkit-box-shadow: 3px 8px 16px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
    }
}

/* Small phone screens */
@media only screen and (max-width: 400px) {
    .content, .events-container, .year-header, .calendar-container {
        width: 320px;
    }
    .dialog {
        width: 320px;
    }
    .months-table {
        display: block;
        margin: 0 auto;
        width: 320px;
    }
    .event-card {
        width: 300px;
    }
    .day {
        padding: 0 7px;
    }
    .month {
        display: inline-block;
        padding: 10px 10px;
        font-size: .8rem;
    }
    .table-date {
        width: 20px;
        height: 20px;
        line-height: 20px;
    }
    .event-name, .event-count, .event-cancelled {
        font-size: .8rem;
    }
    .add-button{
        bottom: 10px;
        right: 10px;
        padding: 0.5rem 1.5rem;
    }
} 
</style>

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Events</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    @auth
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                            href="{{  route('dashboard') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    @else
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('guest') }}">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
                    @endauth
                    <li class="active">Events</li>
                </ol>
            </div>
        </div>
            <div class="col-md-9 col-sm-12">
                <div class="card">
                    <div class="card-head">
                        <header>Calendar</header>
                    </div>
                    <div class="card-body">
                        <div class="panel-body">
                            <div id="calendar" class="has-toolbar"> </div>
                            <div class="content">
    <div class="calendar-container">
      <div class="calendar"> 
        <div class="year-header"> 
          <span class="left-button" id="prev"> &lang; </span> 
          <span class="year" id="label"></span> 
          <span class="right-button" id="next"> &rang; </span>
        </div> 
        <table class="months-table"> 
          <tbody>
            <tr class="months-row">
              <td class="month">Jan</td> 
              <td class="month">Feb</td> 
              <td class="month">Mar</td> 
              <td class="month">Apr</td> 
              <td class="month">May</td> 
              <td class="month">Jun</td> 
              <td class="month">Jul</td>
              <td class="month">Aug</td> 
              <td class="month">Sep</td> 
              <td class="month">Oct</td>          
              <td class="month">Nov</td>
              <td class="month">Dec</td>
            </tr>
          </tbody>
        </table> 
        
        <table class="days-table"> 
          <td class="day">Sun</td> 
          <td class="day">Mon</td> 
          <td class="day">Tue</td> 
          <td class="day">Wed</td> 
          <td class="day">Thu</td> 
          <td class="day">Fri</td> 
          <td class="day">Sat</td>
        </table> 
        <div class="frame"> 
          <table class="dates-table"> 
              <tbody class="tbody">             
              </tbody> 
          </table>
        </div> 
        <button class="button" id="add-button">Add Event</button>
      </div>
    </div>
    <div class="events-container">
    </div>
    <div class="dialog" id="dialog" style="background-color:cornsilk">
        <h2 class="dialog-header"> Add New Event </h2>
        <form class="form" id="form">
          <div class="form-container" align="center">
            <label class="form-label" id="valueFromMyButton" for="name">Event name</label>
            <input class="input" type="text" id="name" maxlength="36">
            <label class="form-label" id="valueFromMyButton" for="count">Number of people to invite</label>
            <input class="input" type="number" id="count" min="0" max="1000000" maxlength="7">
            <input type="button" value="Cancel" class="button" id="cancel-button">
            <input type="button" value="OK" class="button" id="ok-button">
          </div>
        </form>
      </div>
  </div>
  <!-- Dialog Box-->
  <script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous">
  </script>
  <script src="app.js"></script>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addEventTitle">Add Event</h5>
                        <h5 class="modal-title" id="editEventTitle">Edit Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="">
                            <input type="hidden" id="id" name="id">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Title"
                                                name="title" id="title">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label>Category</label>
                                    <select class="form-select" id="categorySelect">
                                        <option id="work" value="fc-event-success">Work</option>
                                        <option id="personal" value="fc-event-warning">Personal</option>
                                        <option id="important" value="fc-event-primary">Important</option>
                                        <option id="travel" value="fc-event-danger">Travel</option>
                                        <option id="friends" value="fc-event-info">Friends</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <input type="text" class="form-control datetimepicker"
                                            placeholder="Start Date" name="starts_at" id="starts-at">
                                    </div>
                                </div>
                                <div class="col-6">

                                    <div class="form-group">
                                        <label>End Date</label>
                                        <input type="text" class="form-control datetimepicker"
                                            placeholder="End Date" name="ends_at" id="ends-at">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Event Details</label>
                                        <textarea id="eventDetails" name="eventDetails"
                                            placeholder="Enter Details" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer bg-whitesmoke pr-0">
                                <button type="button" class="btn btn-round btn-primary" id="add-event">Add
                                    Event</button>
                                <button type="button" class="btn btn-round btn-primary" id="edit-event">Edit
                                    Event</button>
                                <button type="button" id="close" class="btn btn-danger"
                                    data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
    var date = new Date();
    var today = date.getDate();
    // Set click handlers for DOM elements
    $(".right-button").click({date: date}, next_year);
    $(".left-button").click({date: date}, prev_year);
    $(".month").click({date: date}, month_click);
    $("#add-button").click({date: date}, new_event);
    // Set current month as active
    $(".months-row").children().eq(date.getMonth()).addClass("active-month");
    init_calendar(date);
    var events = check_events(today, date.getMonth()+1, date.getFullYear());
    show_events(events, months[date.getMonth()], today);
});

// Initialize the calendar by appending the HTML dates
function init_calendar(date) {
    $(".tbody").empty();
    $(".events-container").empty();
    var calendar_days = $(".tbody");
    var month = date.getMonth();
    var year = date.getFullYear();
    var day_count = days_in_month(month, year);
    var row = $("<tr class='table-row'></tr>");
    var today = date.getDate();
    // Set date to 1 to find the first day of the month
    date.setDate(1);
    var first_day = date.getDay();
    // 35+firstDay is the number of date elements to be added to the dates table
    // 35 is from (7 days in a week) * (up to 5 rows of dates in a month)
    for(var i=0; i<35+first_day; i++) {
        // Since some of the elements will be blank, 
        // need to calculate actual date from index
        var day = i-first_day+1;
        // If it is a sunday, make a new row
        if(i%7===0) {
            calendar_days.append(row);
            row = $("<tr class='table-row'></tr>");
        }
        // if current index isn't a day in this month, make it blank
        if(i < first_day || day > day_count) {
            var curr_date = $("<td class='table-date nil'>"+"</td>");
            row.append(curr_date);
        }   
        else {
            var curr_date = $("<td class='table-date'>"+day+"</td>");
            var events = check_events(day, month+1, year);
            if(today===day && $(".active-date").length===0) {
                curr_date.addClass("active-date");
                show_events(events, months[month], day);
            }
            // If this date has any events, style it with .event-date
            if(events.length!==0) {
                curr_date.addClass("event-date");
            }
            // Set onClick handler for clicking a date
            curr_date.click({events: events, month: months[month], day:day}, date_click);
            row.append(curr_date);
        }
    }
    // Append the last row and set the current year
    calendar_days.append(row);
    $(".year").text(year);
}

// Get the number of days in a given month/year
function days_in_month(month, year) {
    var monthStart = new Date(year, month, 1);
    var monthEnd = new Date(year, month + 1, 1);
    return (monthEnd - monthStart) / (1000 * 60 * 60 * 24);    
}

// Event handler for when a date is clicked
function date_click(event) {
    $(".events-container").show(250);
    $("#dialog").hide(250);
    $(".active-date").removeClass("active-date");
    $(this).addClass("active-date");
    show_events(event.data.events, event.data.month, event.data.day);
};

// Event handler for when a month is clicked
function month_click(event) {
    $(".events-container").show(250);
    $("#dialog").hide(250);
    var date = event.data.date;
    $(".active-month").removeClass("active-month");
    $(this).addClass("active-month");
    var new_month = $(".month").index(this);
    date.setMonth(new_month);
    init_calendar(date);
}

// Event handler for when the year right-button is clicked
function next_year(event) {
    $("#dialog").hide(250);
    var date = event.data.date;
    var new_year = date.getFullYear()+1;
    $("year").html(new_year);
    date.setFullYear(new_year);
    init_calendar(date);
}

// Event handler for when the year left-button is clicked
function prev_year(event) {
    $("#dialog").hide(250);
    var date = event.data.date;
    var new_year = date.getFullYear()-1;
    $("year").html(new_year);
    date.setFullYear(new_year);
    init_calendar(date);
}

// Event handler for clicking the new event button
function new_event(event) {
    // if a date isn't selected then do nothing
    if($(".active-date").length===0)
        return;
    // remove red error input on click
    $("input").click(function(){
        $(this).removeClass("error-input");
    })
    // empty inputs and hide events
    $("#dialog input[type=text]").val('');
    $("#dialog input[type=number]").val('');
    $(".events-container").hide(250);
    $("#dialog").show(250);
    // Event handler for cancel button
    $("#cancel-button").click(function() {
        $("#name").removeClass("error-input");
        $("#count").removeClass("error-input");
        $("#dialog").hide(250);
        $(".events-container").show(250);
    });
    // Event handler for ok button
    $("#ok-button").unbind().click({date: event.data.date}, function() {
        var date = event.data.date;
        var name = $("#name").val().trim();
        var count = parseInt($("#count").val().trim());
        var day = parseInt($(".active-date").html());
        // Basic form validation
        if(name.length === 0) {
            $("#name").addClass("error-input");
        }
        else if(isNaN(count)) {
            $("#count").addClass("error-input");
        }
        else {
            $("#dialog").hide(250);
            console.log("new event");
            new_event_json(name, count, date, day);
            date.setDate(day);
            init_calendar(date);
        }
    });
}

// Adds a json event to event_data
function new_event_json(name, count, date, day) {
    var event = {
        "occasion": name,
        "invited_count": count,
        "year": date.getFullYear(),
        "month": date.getMonth()+1,
        "day": day
    };
    event_data["events"].push(event);
}

// Display all events of the selected date in card views
function show_events(events, month, day) {
    // Clear the dates container
    $(".events-container").empty();
    $(".events-container").show(250);
    console.log(event_data["events"]);
    // If there are no events for this date, notify the user
    if(events.length===0) {
        var event_card = $("<div class='event-card'></div>");
        var event_name = $("<div class='event-name'>There are no events planned for "+month+" "+day+".</div>");
        $(event_card).css({ "border-left": "10px solid #FF1744" });
        $(event_card).append(event_name);
        $(".events-container").append(event_card);
    }
    else {
        // Go through and add each event as a card to the events container
        for(var i=0; i<events.length; i++) {
            var event_card = $("<div class='event-card'></div>");
            var event_name = $("<div class='event-name'>"+events[i]["occasion"]+":</div>");
            var event_count = $("<div class='event-count'>"+events[i]["invited_count"]+" Invited</div>");
            if(events[i]["cancelled"]===true) {
                $(event_card).css({
                    "border-left": "10px solid #FF1744"
                });
                event_count = $("<div class='event-cancelled'>Cancelled</div>");
            }
            $(event_card).append(event_name).append(event_count);
            $(".events-container").append(event_card);
        }
    }
}

// Checks if a specific date has any events
function check_events(day, month, year) {
    var events = [];
    for(var i=0; i<event_data["events"].length; i++) {
        var event = event_data["events"][i];
        if(event["day"]===day &&
            event["month"]===month &&
            event["year"]===year) {
                events.push(event);
            }
    }
    return events;
}

// Given data for events in JSON format
var event_data = {
    "events": [
    {
        "occasion": " Repeated Test Event ",
        "invited_count": 120,
        "year": 2017,
        "month": 5,
        "day": 10,
        "cancelled": true
    },
    {
        "occasion": " Repeated Test Event ",
        "invited_count": 120,
        "year": 2017,
        "month": 5,
        "day": 10,
        "cancelled": true
    },
        {
        "occasion": " Repeated Test Event ",
        "invited_count": 120,
        "year": 2017,
        "month": 5,
        "day": 10,
        "cancelled": true
    },
    {
        "occasion": " Repeated Test Event ",
        "invited_count": 120,
        "year": 2017,
        "month": 5,
        "day": 10
    },
        {
        "occasion": " Repeated Test Event ",
        "invited_count": 120,
        "year": 2017,
        "month": 5,
        "day": 10,
        "cancelled": true
    },
    {
        "occasion": " Repeated Test Event ",
        "invited_count": 120,
        "year": 2017,
        "month": 5,
        "day": 10
    },
        {
        "occasion": " Repeated Test Event ",
        "invited_count": 120,
        "year": 2017,
        "month": 5,
        "day": 10,
        "cancelled": true
    },
    {
        "occasion": " Repeated Test Event ",
        "invited_count": 120,
        "year": 2017,
        "month": 5,
        "day": 10
    },
        {
        "occasion": " Repeated Test Event ",
        "invited_count": 120,
        "year": 2017,
        "month": 5,
        "day": 10,
        "cancelled": true
    },
    {
        "occasion": " Repeated Test Event ",
        "invited_count": 120,
        "year": 2017,
        "month": 5,
        "day": 10
    },
    {
        "occasion": " Test Event",
        "invited_count": 120,
        "year": 2017,
        "month": 5,
        "day": 11
    }
    ]
};

const months = [ 
    "January", 
    "February", 
    "March", 
    "April", 
    "May", 
    "June", 
    "July", 
    "August", 
    "September", 
    "October", 
    "November", 
    "December" 
];
>>>>>>> origin/master
</script>

@endsection