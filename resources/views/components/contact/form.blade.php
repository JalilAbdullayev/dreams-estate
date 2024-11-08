<div class="info-form">
    <h3>
        Get In Touch
    </h3>
    <hr>
    <form action="" method="POST">
        <div class="form-group-name mt-3">
            <label>Your Name</label>
            <input type="text" class="form-control mt-3" placeholder="Your Name" name="name"/>
        </div>
        <div class="text flex justify-between mt-5">
            <div class="form-group flex flex-col">
                <label>Phone Number</label>
                <input type="text" class="form-control mt-3" placeholder="Enter Number" name="phone"/>
            </div>
            <div class="form-group flex flex-col">
                <label>Email Address</label>
                <input type="text" class="form-control mt-3" placeholder="Enter Email" name="email"/>
            </div>
        </div>
        <div class="text flex justify-between">
            <div class="form-group flex flex-col mt-5">
                <label>Country</label>
                <select id="countries" class="text-sm w-full p-2.5 mt-3" name="country">
                    <option selected>Select</option>
                    <option value="US">United States</option>
                    <option value="CA">Canada</option>
                    <option value="FR">France</option>
                    <option value="DE">Germany</option>
                </select>
            </div>
            <div class="form-group flex flex-col mt-5">
                <label>Subject</label>
                <input type="text" class="form-control mt-3" placeholder="Enter Subject" name="subject"/>
            </div>

        </div>
        <div class="form-group-area flex flex-col mt-5">
            <label>
                Message
            </label>
            <textarea class="mt-3" name="text" id="" rows="14" placeholder="Comments"></textarea>
        </div>
        <button type="submit">
            Submit Enquiry
        </button>
    </form>
</div>
