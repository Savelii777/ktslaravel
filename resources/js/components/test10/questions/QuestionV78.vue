<template>
    <div class="test-block">
        <div style="white-space:nowrap" class="test-number number mr-2">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-drag test-drag78">
            <div class="test-caption">
                <p>
                    Тройничный нерв. Блуждающий и языкоглоточный нервы
                    <span>
                    Вписать в схему:
                    <br />1. Двигательный путь X пары (центральный и
                    периферический нейроны). <br />2. Трехнейронный
                    чувствительный путь IX пары. <br />
                    Выберите то что нужно и наведите на рисунок, закрасьте все
                    соответвующие элементы.
                </span>
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <div id="stage-parent78" class="test-compliance">
                <div
                    v-if="!completed"
                    id="question_78"
                    class="compliance-img"
                ></div>
                <div v-if="completed" id="question_78">
                    <div style="display: flex; justify-content: center;">
                        <img
                            :src="currentUrl + '/test-img/answer78.png'"
                            alt="courses"
                            v-bind:class="{
                                correct: correct == 1,
                                incorrect: correct == 0
                            }"
                        />
                    </div>
                </div>
            </div>
            <div class="swipe-block">
                <div class="row">
                    <div class="col-sm-2 col-3">
                        <img
                            :src="currentUrl + '/test-img/arm1.png'"
                            alt="courses"
                        />
                        <img
                            :src="currentUrl + '/test-img/arm2.png'"
                            alt="courses"
                        />
                    </div>
                    <div class="col-sm-10 col-9">
                        <p>
                            Перемешайте картинку вверх-вниз, влево-впарво и
                            увеличивайтечто бы увидеть ее целиком
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
var stage78 = null;
export default {
    props: {
        number: {
            type: String,
            default: "01"
        },
        from: {
            type: String,
            default: "01"
        },
        completed: {
            type: Boolean
        },
        serverAnswers: {
            type: Array
        },
      questions: {
            type: Number,
        },
        ordinalNumber: {
            type: String,
            default: "01"
        },

    },
    created() {
        this.currentUrl = window.location.origin;
    },
    data() {
        return {
            body78: [
                {
                    id: 16,
                    data:
                        "M 41.74,132.87 C 41.74,132.87 50.93,110.18 50.93,110.18 50.93,110.18 68.65,130.82 68.65,130.82 68.65,130.82 41.74,132.87 41.74,132.87 Z"
                },
                {
                    id: 15,
                    data:
                        "M 230.39,448.99 C 230.39,448.99 233.67,450.98 233.67,450.98 233.67,450.98 229.45,456.49 229.45,456.49 229.45,456.49 232.26,462.39 232.37,462.39 232.49,462.39 229.65,464.95 229.65,464.95 229.65,464.95 225.90,457.87 225.90,457.87 225.90,457.87 221.13,457.87 221.13,457.87 221.13,457.87 218.74,454.20 218.74,454.29 218.74,454.37 211.84,452.24 211.84,452.24 211.84,452.24 206.91,453.52 206.91,453.52 206.91,453.52 201.54,447.72 201.54,447.72 201.54,447.72 203.93,443.38 203.93,443.38 203.93,443.38 202.81,435.96 202.81,435.96 202.81,435.96 198.39,433.56 198.47,433.65 198.56,433.73 198.13,425.72 198.13,425.72 198.13,425.72 201.79,422.48 201.79,422.48 201.79,422.48 201.28,414.80 201.28,414.80 201.28,414.80 197.19,412.24 197.19,412.24 197.19,412.24 197.02,403.55 197.02,403.55 197.02,403.55 200.00,400.98 200.00,400.98 200.00,400.98 199.75,392.80 199.75,392.80 199.75,392.80 195.75,391.27 195.75,391.27 195.75,391.27 194.89,382.14 194.89,382.14 194.89,382.14 198.13,379.84 198.13,379.84 198.13,379.84 197.45,371.65 197.45,371.65 197.45,371.65 193.70,369.01 193.70,369.01 193.70,369.01 192.42,361.08 192.42,361.08 192.42,361.08 195.32,358.35 195.32,358.35 195.32,358.35 195.41,350.16 195.41,350.16 195.41,350.16 191.15,347.43 191.15,347.43 191.15,347.43 190.63,338.99 190.63,339.07 190.63,339.17 193.62,335.75 193.62,335.75 193.62,335.75 192.25,328.41 192.25,328.41 192.25,328.41 188.34,325.68 188.34,325.68 188.34,325.68 187.82,317.67 187.82,317.67 187.82,317.67 190.89,314.68 190.89,314.68 190.89,314.68 189.79,306.92 189.79,306.92 189.79,306.92 184.92,304.36 184.92,304.36 184.92,304.36 184.25,296.86 184.25,296.86 184.25,296.86 187.74,293.02 187.74,293.02 187.74,293.02 186.29,285.52 186.21,285.52 186.12,285.52 182.20,283.72 182.20,283.72 182.20,283.72 180.59,275.63 180.59,275.63 180.59,275.63 183.23,272.13 183.23,272.13 183.23,272.13 182.46,264.20 182.46,264.20 182.46,264.20 178.20,262.58 178.20,262.58 178.20,262.58 176.92,254.22 176.92,254.22 176.92,254.22 179.65,250.98 179.65,250.98 179.65,250.98 177.61,242.63 177.61,242.63 177.61,242.63 173.77,241.34 173.77,241.34 173.77,241.34 171.89,233.50 171.89,233.50 171.89,233.50 174.53,230.52 174.53,230.52 174.53,230.52 172.92,221.73 172.92,221.73 172.92,221.73 167.72,220.11 167.72,220.11 167.72,220.11 166.36,213.03 166.36,213.03 166.36,213.03 168.32,208.77 168.32,208.77 168.32,208.77 164.66,201.77 164.66,201.77 164.66,201.77 159.46,200.67 159.46,200.67 159.46,200.67 155.54,194.44 155.54,194.44 155.54,194.44 156.81,190.18 156.81,190.18 156.81,190.18 151.46,183.78 151.46,183.78 151.46,183.78 146.77,183.78 146.77,183.78 146.77,183.78 142.00,178.84 142.00,178.84 142.00,178.84 141.91,173.63 141.91,173.55 141.91,173.46 136.20,168.34 136.29,168.34 136.38,168.34 131.26,168.94 131.26,168.94 131.26,168.94 125.39,164.50 125.39,164.50 125.39,164.50 125.30,159.99 125.39,159.99 125.47,159.99 118.83,155.21 118.83,155.21 118.83,155.21 113.54,156.06 113.54,156.06 113.54,156.06 107.50,152.05 107.50,152.14 107.50,152.22 106.90,147.80 106.90,147.80 106.90,147.80 100.51,143.95 100.51,143.95 100.51,143.95 95.66,145.83 95.66,145.83 95.66,145.83 88.85,142.42 88.85,142.42 88.85,142.42 87.39,137.05 87.39,137.21 87.39,137.38 80.92,134.23 80.92,134.23 80.92,134.23 76.50,136.28 76.50,136.28 76.50,136.28 69.08,132.69 69.08,132.69 69.08,132.69 70.61,129.97 70.61,129.97 70.61,129.97 78.79,133.72 78.79,133.72 78.79,133.72 79.39,137.90 79.31,137.90 79.22,137.90 85.52,141.40 85.52,141.40 85.52,141.40 92.08,139.17 92.08,139.17 92.08,139.17 97.70,142.25 97.70,142.25 97.70,142.25 98.38,147.28 98.38,147.28 98.38,147.28 103.67,151.03 103.67,151.03 103.67,151.03 111.16,149.41 111.16,149.41 111.16,149.41 116.52,153.33 116.52,153.33 116.52,153.33 117.38,158.37 117.38,158.37 117.38,158.37 122.58,162.54 122.58,162.54 122.58,162.54 128.28,161.69 128.28,161.77 128.28,161.87 133.65,166.21 133.65,166.21 133.65,166.21 133.74,170.73 133.74,170.73 133.74,170.73 139.53,176.44 139.53,176.44 139.53,176.44 144.47,176.02 144.47,176.02 144.47,176.02 149.23,181.74 149.23,181.74 149.23,181.74 148.90,185.49 148.98,185.57 149.07,185.66 154.35,192.39 154.35,192.39 154.35,192.39 158.60,192.82 158.60,192.82 158.60,192.82 162.87,198.79 162.87,198.79 162.87,198.79 161.58,203.05 161.58,203.05 161.58,203.05 164.40,210.22 164.49,210.22 164.57,210.22 169.60,211.24 169.60,211.32 169.60,211.41 171.72,219.77 171.72,219.77 171.72,219.77 169.00,223.18 169.00,223.18 169.00,223.18 170.70,230.60 170.70,230.60 170.70,230.60 175.47,233.16 175.47,233.16 175.47,233.16 176.92,240.83 176.92,240.83 176.92,240.83 174.11,244.07 174.11,244.07 174.11,244.07 175.82,251.66 175.82,251.66 175.82,251.66 180.07,253.88 180.07,253.88 180.07,253.88 181.44,261.81 181.44,261.81 181.44,261.81 178.54,265.23 178.54,265.23 178.54,265.23 179.99,272.38 179.99,272.47 179.99,272.56 184.59,275.20 184.59,275.20 184.59,275.20 185.19,282.88 185.19,282.88 185.19,282.88 182.38,286.29 182.38,286.29 182.38,286.29 183.57,294.47 183.57,294.56 183.57,294.64 188.17,295.92 188.17,295.92 188.17,295.92 189.27,304.36 189.27,304.36 189.27,304.36 185.44,307.44 185.44,307.44 185.44,307.44 186.55,315.53 186.55,315.53 186.55,315.53 191.15,317.59 191.15,317.59 191.15,317.59 191.83,325.77 191.83,325.77 191.83,325.77 188.76,328.85 188.76,328.85 188.76,328.85 190.04,337.11 190.04,337.29 190.04,337.46 193.79,338.40 193.79,338.56 193.79,338.73 194.73,346.75 194.73,346.75 194.73,346.75 191.15,350.68 191.31,350.68 191.48,350.68 192.00,358.26 192.08,358.26 192.17,358.26 196.60,360.23 196.60,360.48 196.60,360.74 196.94,369.35 196.94,369.35 196.94,369.35 193.27,371.74 193.27,371.74 193.27,371.74 194.56,378.30 194.38,379.16 194.21,380.01 198.30,382.49 198.30,382.49 198.30,382.49 199.33,390.67 199.33,390.67 199.33,390.67 196.17,393.83 196.17,393.83 196.17,393.83 196.60,401.16 196.60,401.16 196.60,401.16 200.18,403.89 200.18,403.89 200.18,403.89 201.28,412.34 201.28,412.34 201.28,412.34 197.87,414.63 197.87,414.63 197.87,414.63 198.39,422.65 198.39,422.65 198.39,422.65 202.22,425.29 202.22,425.29 202.22,425.29 202.56,433.91 202.56,433.91 202.56,433.91 198.98,436.73 198.98,436.73 198.98,436.73 200.43,444.91 200.43,444.91 200.43,444.91 204.69,445.59 204.69,445.59 204.69,445.59 209.89,451.30 209.89,451.30 209.89,451.30 209.80,455.14 209.80,455.14 209.80,455.14 219.51,457.45 219.42,457.36 219.34,457.27 221.13,454.55 221.13,454.63 221.13,454.72 225.50,454.44 225.50,454.44 225.50,454.44 230.39,448.99 230.39,448.99 Z"
                },
                {
                    id: 14,
                    data:
                        "M 250.86,458.30 C 289.39,467.24 371.27,462.40 370.88,462.31 370.88,462.31 369.86,457.95 369.86,457.95 369.86,457.95 379.73,463.16 379.73,463.16 379.73,463.16 369.86,468.19 369.86,468.19 369.86,468.19 370.80,464.77 370.80,464.77 331.10,469.49 260.23,465.38 250.35,460.85 249.66,466.06 241.92,467.50 241.91,467.17 241.91,467.18 234.51,466.51 233.56,458.47 233.42,455.82 233.76,450.17 241.91,449.34 242.03,448.55 251.69,450.44 250.86,458.30 Z"
                },
                {
                    id: 10,
                    data:
                        "M 391.90,455.62 C 391.84,455.62 389.09,455.62 389.09,455.62 389.09,455.62 391.78,462.48 391.78,462.48 391.78,462.48 386.45,469.87 386.45,469.87 386.45,469.87 389.68,469.92 389.68,469.92 389.68,469.92 393.18,464.88 393.18,464.88 393.18,464.88 394.71,469.87 394.71,469.87 394.71,469.87 397.52,469.87 397.52,469.87 397.52,469.87 394.71,463.06 394.71,463.06 394.71,463.06 400.10,455.85 400.10,455.85 400.10,455.85 396.53,456.02 396.53,456.02 396.53,456.02 394.06,460.13 394.06,460.13 394.06,460.13 391.95,455.62 391.90,455.62 Z"
                },
                {
                    id: 14,
                    data:
                        "M 188.57,171.67 C 197.70,173.23 197.19,179.37 197.82,180.69 197.34,189.79 189.38,189.34 189.38,189.26 181.56,189.81 180.47,181.29 180.48,181.29 120.40,154.08 92.97,128.78 71.68,103.77 71.68,103.77 68.98,108.82 68.98,108.82 68.98,108.82 64.30,89.59 64.30,89.59 64.30,89.59 80.94,99.20 80.94,99.20 80.94,99.20 75.66,101.43 75.66,101.43 73.21,100.51 121.74,154.50 181.31,176.83 182.71,174.48 184.94,172.14 188.57,171.67 Z"
                },
                {
                    id: 13,
                    data:
                        "M 182.71,198.17 C 182.71,197.94 183.65,193.25 183.65,193.25 183.65,193.25 193.72,195.12 193.72,195.12 193.72,195.12 198.88,189.96 198.88,189.96 198.88,189.96 202.86,192.78 202.86,192.78 202.86,192.78 197.47,200.52 197.47,200.52 194.83,209.10 211.17,422.26 212.10,419.24 213.31,423.36 229.05,421.65 233.19,422.19 232.78,419.83 234.63,412.45 241.91,413.95 245.00,413.80 251.96,415.55 250.60,422.22 251.80,427.35 245.74,432.04 241.41,431.00 239.55,430.99 233.40,426.41 233.40,426.41 233.55,426.58 213.30,428.73 208.01,423.08 204.93,421.63 191.45,200.68 191.76,200.83 191.76,200.83 182.71,198.41 182.71,198.17 Z"
                },
                {
                    id: 13,
                    data:
                        "M 320.69,401.03 C 321.05,392.80 329.84,392.54 329.82,392.95 329.81,392.78 337.68,393.12 338.25,401.03 339.11,409.49 332.40,410.18 332.40,410.18 332.40,410.18 331.58,416.62 331.58,416.62 350.83,428.98 388.74,424.95 388.74,424.95 388.74,424.95 388.74,429.64 388.74,429.64 346.08,433.41 332.58,419.99 328.36,420.21 318.57,426.27 279.05,427.93 261.36,427.01 261.36,427.01 254.81,432.81 254.81,432.81 254.81,432.81 251.99,430.11 251.99,430.11 251.99,430.11 257.79,424.31 257.79,424.31 257.79,424.31 251.58,418.15 251.58,418.15 251.58,418.15 254.75,415.05 254.75,415.05 254.75,415.05 261.60,421.96 261.60,421.96 261.60,421.96 283.96,425.02 327.01,416.92 327.01,416.92 326.65,410.41 326.65,410.41 326.65,410.41 321.58,411.13 320.69,401.03 Z"
                },
                {
                    id: 16,
                    data:
                        "M 397.28,124.00 C 397.28,124.00 406.32,143.78 406.32,143.78 406.32,143.78 384.17,142.25 384.17,142.25 384.17,142.25 397.28,124.00 397.28,124.00 Z"
                },
                {
                    id: 15,
                    data:
                        "M 233.55,406.43 C 233.55,406.43 237.06,409.94 237.06,409.83 237.06,409.71 242.45,405.96 242.45,405.96 242.45,405.96 247.48,411.46 247.48,411.46 247.48,411.46 250.06,408.54 250.06,408.54 250.06,408.54 243.82,402.84 243.82,402.84 243.82,402.84 243.98,395.96 243.98,395.96 243.98,395.96 241.54,394.12 241.54,394.12 241.54,394.12 241.46,385.71 241.46,385.71 241.46,385.71 244.55,383.35 244.55,383.35 244.55,383.35 244.92,374.70 244.92,374.70 244.92,374.70 242.11,372.38 242.11,372.38 242.11,372.38 242.68,364.22 242.68,364.22 242.68,364.22 245.65,361.20 245.65,361.20 245.65,361.20 246.27,353.54 246.27,353.54 246.27,353.54 243.34,351.00 243.34,351.00 243.34,351.00 243.74,342.24 243.74,342.24 243.74,342.24 247.24,339.99 247.24,339.99 247.24,339.99 247.77,331.47 247.77,331.47 247.77,331.47 245.29,329.55 245.29,329.51 245.29,329.47 246.19,321.03 246.19,321.03 246.19,321.03 249.45,319.03 249.45,319.03 249.45,319.03 250.38,309.77 250.38,309.77 250.38,309.77 247.82,308.23 247.82,308.23 247.82,308.23 249.00,299.46 249.00,299.46 249.00,299.46 252.29,297.29 252.29,297.29 252.29,297.29 253.23,288.20 253.23,288.20 253.23,288.20 250.99,286.32 250.99,286.32 250.99,286.32 251.97,278.00 251.97,278.00 251.97,278.00 255.35,276.45 255.35,276.45 255.35,276.45 257.06,267.39 257.06,267.39 257.06,267.39 254.74,265.36 254.74,265.36 254.74,265.36 255.47,256.34 255.47,256.34 255.47,256.34 259.14,255.00 259.14,255.00 259.14,255.00 260.69,246.44 260.69,246.44 260.69,246.44 257.95,243.41 257.95,243.37 257.95,243.33 260.45,235.54 260.45,235.54 260.45,235.54 264.19,234.03 264.19,234.03 264.19,234.03 267.01,226.41 267.01,226.41 267.01,226.41 265.05,222.45 265.05,222.45 265.05,222.45 268.83,214.86 268.79,214.86 268.76,214.86 272.66,213.97 272.66,213.97 272.66,213.97 276.82,208.01 276.82,208.01 276.82,208.01 275.56,202.95 275.56,202.95 275.56,202.95 280.73,196.79 280.73,196.75 280.73,196.72 284.85,197.08 284.85,197.08 284.85,197.08 290.59,191.09 290.59,191.09 290.59,191.09 290.31,186.84 290.31,186.84 290.31,186.84 296.25,181.21 296.25,181.21 296.25,181.21 300.81,181.90 300.81,181.90 300.81,181.90 306.97,177.70 306.97,177.70 306.97,177.70 306.93,173.63 306.93,173.63 306.93,173.63 313.81,168.98 313.81,168.98 313.81,168.98 318.54,169.83 318.54,169.83 318.54,169.83 324.98,165.83 324.98,165.83 324.98,165.83 325.87,162.20 325.87,162.20 325.87,162.20 332.27,158.94 332.27,158.94 332.27,158.94 337.52,159.84 337.52,159.84 337.52,159.84 344.00,156.54 344.00,156.54 344.00,156.54 345.47,152.75 345.47,152.75 345.47,152.75 352.96,149.77 352.96,149.77 352.96,149.77 357.32,151.81 357.32,151.81 357.32,151.81 364.28,149.56 364.28,149.56 364.28,149.56 365.31,146.30 365.31,146.30 365.31,146.30 373.82,143.32 373.82,143.32 373.82,143.32 377.45,145.65 377.45,145.65 377.45,145.65 384.25,143.37 384.25,143.37 384.25,143.37 383.56,140.92 383.56,140.92 383.56,140.92 376.67,142.35 376.67,142.35 376.67,142.35 375.04,146.22 375.04,146.22 375.04,146.22 366.85,148.58 366.85,148.58 366.85,148.58 363.15,146.43 363.15,146.43 363.15,146.43 355.49,148.87 355.49,148.87 355.49,148.87 354.10,153.19 354.10,153.19 354.10,153.19 347.17,156.13 347.17,156.13 347.17,156.13 342.12,154.46 342.12,154.46 342.12,154.46 335.36,157.20 335.36,157.20 335.36,157.20 334.67,161.35 334.67,161.35 334.67,161.35 329.04,164.29 329.04,164.29 329.04,164.29 322.48,163.47 322.48,163.47 322.48,163.47 316.50,167.35 316.50,167.35 316.50,167.35 316.22,171.51 316.22,171.51 316.22,171.51 309.57,175.96 309.57,175.96 309.57,175.96 305.06,175.26 305.06,175.26 305.06,175.26 298.86,179.14 298.86,179.14 298.86,179.14 298.41,183.78 298.41,183.78 298.41,183.78 292.67,189.01 292.67,189.01 292.67,189.01 287.66,188.84 287.66,188.84 287.66,188.84 282.64,194.15 282.64,194.15 282.64,194.15 283.25,198.79 283.25,198.79 283.25,198.79 278.57,205.28 278.57,205.28 278.57,205.28 274.14,205.40 274.14,205.40 274.14,205.40 270.26,212.37 270.26,212.37 270.26,212.37 272.01,216.29 272.01,216.29 272.01,216.29 267.98,223.75 267.98,223.75 267.98,223.75 264.39,224.81 264.39,224.81 264.39,224.81 260.97,232.89 260.97,232.89 260.97,232.89 263.62,236.19 263.62,236.19 263.62,236.19 261.54,243.86 261.54,243.86 261.54,243.86 257.14,245.62 257.14,245.69 257.14,245.78 255.80,254.47 255.80,254.47 255.80,254.47 259.01,256.75 259.01,256.75 259.01,256.75 258.08,264.87 258.08,264.87 258.08,264.87 253.68,267.48 253.72,267.51 253.77,267.56 252.42,275.68 252.38,275.68 252.33,275.68 255.40,277.95 255.40,277.95 255.40,277.95 254.37,286.40 254.37,286.40 254.37,286.40 250.75,288.20 250.75,288.20 250.75,288.20 248.67,296.89 248.67,296.89 248.67,296.89 252.21,300.07 252.21,300.07 252.21,300.07 251.36,307.97 251.36,307.97 251.36,307.97 247.21,310.38 247.21,310.38 247.21,310.38 246.19,318.79 246.19,318.79 246.19,318.79 249.90,320.70 249.90,320.70 249.90,320.70 248.55,329.27 248.55,329.27 248.55,329.27 244.55,331.43 244.55,331.43 244.55,331.43 243.98,340.20 243.98,340.20 243.98,340.20 246.92,342.28 246.92,342.28 246.92,342.28 247.04,350.23 247.04,350.23 247.04,350.23 242.80,353.26 242.80,353.26 242.80,353.26 242.40,361.29 242.40,361.29 242.40,361.29 245.00,364.06 245.00,364.06 245.00,364.06 244.88,372.21 244.88,372.21 244.88,372.21 241.46,374.66 241.46,374.66 241.46,374.66 241.58,383.19 241.58,383.19 241.58,383.19 244.19,385.43 244.19,385.43 244.19,385.43 243.66,394.12 243.66,394.12 243.66,394.12 241.05,396.41 241.05,396.41 241.05,396.41 240.97,402.68 240.97,402.68 240.97,402.68 233.55,406.43 233.55,406.43 Z"
                },
                {
                    id: 9,
                    data:
                        "M 403.90,420.32 C 403.90,420.32 397.34,420.21 397.34,420.21 397.34,420.21 394.44,434.30 394.44,434.30 394.44,434.30 397.11,434.22 397.11,434.22 397.11,434.22 400.04,420.26 400.04,420.26 400.04,420.26 400.97,420.28 400.97,420.28 400.97,420.28 403.08,426.72 403.08,426.72 403.08,426.72 397.97,434.30 397.97,434.30 397.97,434.30 400.95,434.32 400.95,434.32 400.95,434.32 404.37,429.59 404.37,429.59 404.37,429.59 406.83,434.22 406.83,434.22 406.83,434.22 409.23,434.28 409.23,434.28 409.23,434.28 406.48,426.89 406.48,426.89 406.48,426.89 411.52,420.44 411.52,420.44 411.52,420.44 408.58,420.26 408.58,420.26 408.58,420.26 405.31,425.13 405.31,425.13"
                }
            ],
            complited78: false,
            icons: [
                {
                    icon: "test-img/circle1(74-a).png",
                    id: 13
                },
                {
                    icon: "test-img/icon14.png",
                    id: 14
                },
                {
                    icon: "test-img/icon15.png",
                    id: 15
                },
                {
                    icon: "test-img/icon16.png",
                    id: 16
                }
            ],
            draggetItem: null,
            question_78Width: 645,
            question_78Height: 450
        };
    },
    watch: {
        complited78: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 78,
                    answer: [{ result: this.complited78 }]
                });
            },
            deep: true
        }
    },
    mounted() {
        if (!this.completed)
        {
            setTimeout(() => {
                this.onStart();
                let swiper = document.querySelector(".test-swiper").swiper
                swiper.update()
            }, 2000)
        }
    },
    methods: {
        fitStageIntoParentContainer() {
            var container = document.querySelector("#stage-parent78");

            // now we need to fit stage into parent
            //var containerWidth = container.offsetWidth;
            // to do this we need to scale the stage
            var scale = 0.94;

            stage78.width(this.question_78Width * scale);
            stage78.height(this.question_78Height);
            stage78.scale({
                x: scale,
                y: scale
            });
            stage78.draw();
        },

        onStart() {
            let self = this;
            stage78 = new Konva.Stage({
                container: "question_78",
                width: this.question_78Width,
                height: this.question_78Height
            });

            var templayer78 = new Konva.Layer();
            var layer78 = new Konva.Layer();
            var group78 = new Konva.Group();
            var answerList78 = [];
            stage78.add(layer78);
            stage78.add(templayer78);
            var path78Front;

            var test77one;
            Konva.Image.fromURL(`${this.currentUrl}/test-img/78.png`, function(
                test77one
            ) {
                test77one.setAttrs({
                    x: 0,
                    y: 0,
                    scaleX: 0.75,
                    scaleY: 0.75
                });
                templayer78.add(test77one);
                templayer78.batchDraw();
            });

            for (var i = 0; i < this.body78.length; i++) {
                path78Front = new Konva.Path({
                    x: 0,
                    y: 0,
                    fill: "#f5f5f5", //"",
                    data: this.body78[i].data,
                    numPoints: 10,
                    innerRadius: 20,
                    outerRadius: 25,
                    scaleX: 0.79,
                    scaleY: 0.79,
                    id: this.body78[i].id
                });
                layer78.add(path78Front);
            }

            var borderOfRect78;
            var dot78 = new Image();
            var dottedLine78 = new Image();
            var arrowRight78 = new Image();
            var chevroneRight78 = new Image();
            var line78 = new Image();

            borderOfRect78 = new Konva.Rect({
                cornerRadius: 5,
                x: 350,
                y: 5,
                width: 118,
                height: 54,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group78.add(borderOfRect78);

            borderOfRect78 = new Konva.Rect({
                cornerRadius: 5,
                x: 480,
                y: 5,
                width: 118,
                height: 54,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group78.add(borderOfRect78);

            borderOfRect78 = new Konva.Rect({
                cornerRadius: 5,
                x: 350,
                y: 75,
                width: 118,
                height: 54,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group78.add(borderOfRect78);

            borderOfRect78 = new Konva.Rect({
                cornerRadius: 5,
                x: 480,
                y: 75,
                width: 118,
                height: 54,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group78.add(borderOfRect78);

            borderOfRect78 = new Konva.Rect({
                cornerRadius: 5,
                x: 350,
                y: 145,
                width: 118,
                height: 54,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group78.add(borderOfRect78);

            borderOfRect78 = new Konva.Rect({
                cornerRadius: 5,
                x: 480,
                y: 145,
                width: 118,
                height: 54,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group78.add(borderOfRect78);

            borderOfRect78 = new Konva.Rect({
                cornerRadius: 5,
                x: 350,
                y: 215,
                width: 247,
                height: 54,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group78.add(borderOfRect78);

            Konva.Image.fromURL(
                `${this.currentUrl}/test-img/icon13.png`,
                function(line78) {
                    line78.setAttrs({
                        x: 527,
                        y: 172,
                        scaleX: 1.2,
                        scaleY: 1.2,
                        draggable: true,
                        name: "line",
                        id: 13
                    });
                    templayer78.add(line78);
                    templayer78.batchDraw();
                }
            );

            Konva.Image.fromURL(
                `${this.currentUrl}/test-img/icon15.png`,
                function(line78) {
                    line78.setAttrs({
                        x: 522,
                        y: 100,
                        scaleX: 2,
                        scaleY: 5,
                        draggable: true,
                        name: "line",
                        id: 15
                    });
                    templayer78.add(line78);
                    templayer78.batchDraw();
                }
            );

            Konva.Image.fromURL(`${this.currentUrl}/test-img/10.png`, function(
                dot78
            ) {
                dot78.setAttrs({
                    x: 404,
                    y: 25,
                    scaleX: 1.2,
                    scaleY: 1.2,
                    draggable: true,
                    name: "Image dot",
                    id: 10
                });
                templayer78.add(dot78);
                templayer78.batchDraw();
            });
            Konva.Image.fromURL(`${this.currentUrl}/test-img/9.png`, function(
                dot78
            ) {
                dot78.setAttrs({
                    x: 533,
                    y: 25,
                    scaleX: 1.2,
                    scaleY: 1.2,
                    draggable: true,
                    name: "Image dot",
                    id: 9
                });
                templayer78.add(dot78);
                templayer78.batchDraw();
            });

            Konva.Image.fromURL(
                `${this.currentUrl}/test-img/icon14.png`,
                function(dottedLine78) {
                    dottedLine78.setAttrs({
                        x: 405,
                        y: 95,
                        scaleX: 1,
                        scaleY: 1,
                        draggable: true,
                        name: "Image dotted line",
                        id: 14
                    });
                    templayer78.add(dottedLine78);
                    templayer78.batchDraw();
                }
            );
            Konva.Image.fromURL(
                `${this.currentUrl}/test-img/icon16.png`,
                function(arrowRight78) {
                    arrowRight78.setAttrs({
                        x: 405,
                        y: 165,
                        scaleX: 1.2,
                        scaleY: 1.2,
                        draggable: true,
                        name: "Image arrow right",
                        id: 16
                    });
                    templayer78.add(arrowRight78);
                    templayer78.batchDraw();
                }
            );

            var text78;
            text78 = new Konva.Text({
                x: 447,
                y: 238,
                draggable: false,
                fill: "black",
                text: "Очистить"
            });
            group78.add(text78);

            templayer78.add(group78);
            templayer78.draw();
            var targetPositionX;
            var targetPositionY;
            var counter78 = 0;
            stage78.on("dragstart", function(e) {
                e.target.moveTo(templayer78);
                targetPositionX = e.target.attrs.x;
                targetPositionY = e.target.attrs.y;
                self.draggetItem = e.target.attrs.id;
                //console.log(targetPositionX)
                //console.log('Moving ' + e.target.name());
                layer78.draw();
            });

            var previousShape;
            stage78.on("dragmove", function(evt) {
                var pos = stage78.getPointerPosition();
                var shape = layer78.getIntersection(pos);
                if (previousShape && shape) {
                    if (previousShape !== shape) {
                        // leave from old targer
                        previousShape.fire(
                            "dragleave",
                            {
                                type: "dragleave",
                                target: previousShape,
                                evt: evt.evt
                            },
                            true
                        );

                        // enter new targer
                        shape.fire(
                            "dragenter",
                            {
                                type: "dragenter",
                                target: shape,
                                evt: evt.evt
                            },
                            true
                        );
                        previousShape = shape;
                    } else {
                        previousShape.fire(
                            "dragover",
                            {
                                type: "dragover",
                                target: previousShape,
                                evt: evt.evt
                            },
                            true
                        );
                    }
                } else if (!previousShape && shape) {
                    previousShape = shape;
                    shape.fire(
                        "dragenter",
                        {
                            type: "dragenter",
                            target: shape,
                            evt: evt.evt
                        },
                        true
                    );
                } else if (previousShape && !shape) {
                    previousShape.fire(
                        "dragleave",
                        {
                            type: "dragleave",
                            target: previousShape,
                            evt: evt.evt
                        },
                        true
                    );
                    previousShape = undefined;
                }
            });

            stage78.on("dragend", function(e) {
                var pos = stage78.getPointerPosition();
                var shape = layer78.getIntersection(pos);
                if (shape) {
                    previousShape.fire(
                        "drop",
                        {
                            type: "drop",
                            target: previousShape,
                            evt: e.evt
                        },
                        true
                    );
                }
                if (previousShape != undefined) {
                    e.target.setAttrs({
                        x: targetPositionX,
                        y: targetPositionY
                    });
                }
                console.log(counter78);
                if (counter78 === 10) {
                    self.complited78 = true;
                    console.log(self.complited78);
                }
                previousShape = undefined;
                layer78.draw();
                templayer78.draw();
            });

            stage78.on("dragenter", function(e) {
                e.target.fill("red");
                layer78.draw();
            });

            stage78.on("dragleave", function(e) {
                e.target.fill("#f5f5f5");
                layer78.draw();
            });

            stage78.on("dragover", function(e) {
                layer78.draw();
            });

            stage78.on("drop", function(e) {
                if (e.target.attrs.id === self.draggetItem) {
                    e.target.fill("black");
                    e.target.moveTo(templayer78);
                    counter78++;
                } else {
                    e.target.fill("#f5f5f5");
                }
                layer78.draw();
            });
            this.fitStageIntoParentContainer();
            text78.on("click", this.onStart);
            text78.on("tap", this.onStart);
        }
    },
    computed: {
        currentQuestionAnswers() {
            if (!this.serverAnswers) {
                return null;
            }

            return this.serverAnswers.find(x => x.question_index == "78");
        },
        correct() {
            if (!this.serverAnswers) {
                return null;
            }

            try {
                if (this.currentQuestionAnswers.answer[0].result) {
                    return 1;
                } else {
                    return 0;
                }
            } catch (error) {
                return 0;
            }
        }
    }
};
</script>

<style>
.drag,
.drop {
    display: inline-block;
}

.drop.allowed {
    background-color: #dfd;
}
</style>
