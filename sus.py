def calculate_sus_score(responses):
    total_score = 0

    for i in range(len(responses)):
        if i % 2 == 0:
            total_score += responses[i] - 1
        else:
            total_score += 5 - responses[i]

    sus_score = (total_score) * 2.5
    print("Total:", total_score)
    return sus_score


# Mengambil input nilai dari pengguna
responses = []
for i in range(10):
    response = int(input(f"Masukkan nilai ke-{i+1}: "))
    while response < 0 or response > 4:
        print("Nilai harus antara 0 hingga 4.")
        response = int(input(f"Masukkan nilai ke-{i+1}: "))
    responses.append(response)

# Menghitung dan mencetak skor SUS
sus_score = calculate_sus_score(responses)
print("Skor SUS Anda adalah:", sus_score)